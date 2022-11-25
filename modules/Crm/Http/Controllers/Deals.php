<?php

namespace Modules\Crm\Http\Controllers;

use App\Traits\DateTime;
use Modules\Crm\Models\Deal;
use Modules\Crm\Models\Company;
use Modules\Crm\Models\Contact;
use App\Models\Setting\Currency;
use Modules\Crm\Jobs\CreateDeal;
use Modules\Crm\Jobs\DeleteDeal;
use Modules\Crm\Jobs\UpdateDeal;
use Illuminate\Http\JsonResponse;
use App\Abstracts\Http\Controller;
use Modules\Crm\Traits\Activities;
use Modules\Crm\Models\DealActivity;
use Modules\Crm\Models\DealPipeline;
use Modules\Crm\Models\CompanyContact;
use Modules\Crm\Jobs\UpdateDealActivity;
use Modules\Crm\Models\DealActivityType;
use Modules\Crm\Exports\Deals\Deals as Export;
use Modules\Crm\Http\Requests\Deal as Request;
use Modules\Crm\Imports\Deals\Deals as Import;
use Illuminate\Http\Request as IrregularRequest;
use App\Http\Requests\Common\Import as ImportRequest;

class Deals extends Controller
{
    use Activities, DateTime;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pipelines_select = DealPipeline::where('company_id', company_id())->pluck('name', 'id');

        $pipeline_filter = request('pipeline');
        $status = request('status', 'open');

        $status_select = [
            'open' => trans('crm::general.open'),
            'won' => trans('crm::general.won'),
            'lost' => trans('crm::general.lost'),
            'trash' => trans('crm::general.trash')
        ];

        if (empty($pipeline_filter)) {
            $pipelines = DealPipeline::where('company_id', company_id())->first();
        } else {
            $pipelines = DealPipeline::where('id', $pipeline_filter)->first();
        }

        $stages = collect();

        if ($pipelines) {
            $stages = $pipelines->stages()->get();
        }

        foreach ($stages as $stage) {
            $items = [];

            foreach ($stage->filterDeals as $deal) {
                $symbol = Currency::where('code', '=', $deal->currency_code)->value('symbol');

                $items[] = [
                    'stage_id' => $stage->id,
                    'deal_id' => $deal->id,
                    'name' => $deal->name,
                    'currency_symbol' => $symbol,
                    'amount' => $deal->amount,
                    'raw_amount' => $deal->amount,
                    'color' => $deal->color,
                    'contact' => $deal->contact->name,
                    'company' => $deal->company->name,
                    'show' => true,
                    'edit' => true,
                    'delete' => true,
                ];
            }

            $stage->items = $items;
        }

        return view('crm::deals.index', compact('pipelines', 'stages', 'status_select', 'pipelines_select'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @param  Contact  $contact
     *
     * @return Response
     */
    public function show(Deal $deal)
    {
        $company = Company::where('id', $deal->crm_company_id)->first();
        $contact = Contact::where('id', $deal->crm_contact_id)->first();

        $mail_to = [];

        if (!empty($company)) {
            $mail_to = [$company->contact->email => $company->contact->email];
        }

        if (!empty($contact)) {
            $mail_to = [$contact->contact->email => $contact->contact->email];
        }

        $activity_types = DealActivityType::all()->pluck('name', 'id');

        $durations = [
            '0:15' => '0:15', '0:30' => '0:30', '0:45' => '0:45',
            '1:00' => '1:00', '1:15' => '1:15', '1:30' => '1:30', '1:45' => '1:45',
            '2:00' => '2:00', '2:15' => '2:15', '2:30' => '2:30', '2:45' => '2:45',
            '3:00' => '3:00', '3:15' => '3:15', '3:30' => '3:30', '3:45' => '3:45',
            '4:00' => '4:00', '4:15' => '4:15', '4:30' => '4:30', '4:45' => '4:45',
            '5:00' => '5:00', '5:15' => '5:15', '5:30' => '5:30', '5:45' => '5:45',
            '6:00' => '6:00', '6:15' => '6:15', '6:30' => '6:30', '6:45' => '6:45',
            '7:00' => '7:00', '7:15' => '7:15', '7:30' => '7:30', '7:45' => '7:45',
            '8:00' => '8:00'
        ];

        $assigneds = \App\Models\Common\Company::find(company_id())->users()->pluck('name', 'id');

        $competitors = $deal->competitors()->orderBy('created_at', 'desc')->get();

        $agents = $deal->agents()->get();

        //TimeLine
        $activities = $deal->activities()->orderBy('created_at', 'desc')->get();
        $notes = $deal->notes()->orderBy('created_at', 'desc')->get();
        $emails = $deal->emails()->orderBy('created_at', 'desc')->get();

        $all = (object) array_merge_recursive((array) $activities, (array) $notes, (array) $emails);

        $timelines = [
            'all' => $this->getTimelineData($all),
            'activities' => $this->getTimelineData((object) array_merge_recursive((array)$activities)),
            'notes' => $this->getTimelineData((object) array_merge_recursive((array)$notes)),
            'emails' => $this->getTimelineData((object) array_merge_recursive((array)$emails)),
        ];

        $stages =  $deal->pipeline->stages()->get();

        return view('crm::deals.show', compact('company', 'contact', 'competitors', 'timelines', 'deal', 'mail_to', 'agents', 'activities', 'assigneds', 'durations', 'activity_types', 'stages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $contacts = Contact::with('contact')->enabled()->get()->pluck('name', 'id');

        $companies = Company::with('contact')->enabled()->get()->pluck('name', 'id');

        $pipelines = DealPipeline::get()->pluck('name', 'id');

        $owners = \App\Models\Common\Company::find(company_id())->users()->pluck('name', 'id');

        $currencies = Currency::enabled()->pluck('name', 'code');

        return view('crm::deals.create', compact('contacts', 'companies', 'owners', 'pipelines', 'currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request['created_by'] = user()->id;
        $request['company_id'] = company_id();

        $response = $this->ajaxDispatch(new CreateDeal($request));

        if ($response['success']) {
            $response['redirect'] = route('crm.deals.index');

            $message = trans('messages.success.added', ['type' => trans_choice('crm::general.deals', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('crm.deals.create');

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Duplicate the specified resource.
     *
     * @param  Deal $deal
     *
     * @return Response
     */
    public function duplicate(Deal $deal)
    {
        $clone = $deal->duplicate();

        $message = trans('messages.success.duplicated', ['type' => trans_choice('crm::general.deals', 1)]);

        flash($message)->success();

        return redirect()->route('crm.deals.edit', $clone->id);
    }

    /**
     * Import the specified resource.
     *
     * @param  ImportRequest $request
     *
     * @return Response
     */
    public function import(ImportRequest $request): JsonResponse
    {
        $response = $this->importExcel(new Import, $request, trans_choice('crm::general.deals', 2));

        if ($response['success']) {
            $response['redirect'] = route('crm.deals.index');

            flash($response['message'])->success();
        } else {
            $response['redirect'] = route('import.create', ['crm', 'deals']);

            flash($response['message'])->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Deal $deal
     *
     * @return Response
     */
    public function edit(Deal $deal)
    {
        $contacts = Contact::with('contact')->enabled()->get()->pluck('name', 'id');

        $companies = Company::with('contact')->enabled()->get()->pluck('name', 'id');

        $pipelines = DealPipeline::get()->pluck('name', 'id');

        $owners = \App\Models\Common\Company::find(company_id())->users()->pluck('name', 'id');

        $currencies = Currency::enabled()->pluck('name', 'code');

        return view('crm::deals.edit', compact('deal', 'contacts', 'companies', 'owners', 'pipelines', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Deal $deal
     * @param  Request $request
     *
     * @return Response
     */
    public function update(Deal $deal, Request $request)
    {
        $response = $this->ajaxDispatch(new UpdateDeal($deal, $request));

        if ($response['success']) {
            $response['redirect'] = route('crm.deals.index');

            $message = trans('messages.success.updated', ['type' => trans_choice('crm::general.deals', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('crm.deals.edit', $deal->id);

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Enable the specified resource.
     *
     * @param  Deal $deal
     *
     * @return Response
     */
    public function enable(Deal $deal)
    {
        $response = $this->ajaxDispatch(new UpdateDeal($deal, request()->merge(['enabled' => 1])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.enabled', ['type' => trans_choice('crm::general.deals', 1)]);
        }

        return response()->json($response);
    }

    /**
     * Disable the specified resource.
     *
     * @param  Deal $deal
     *
     * @return Response
     */
    public function disable(Deal $deal)
    {
        $response = $this->ajaxDispatch(new UpdateDeal($deal, request()->merge(['enabled' => 0])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.disabled', ['type' => trans_choice('crm::general.deals', 1)]);
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Deal $deal
     *
     * @return Response
     */
    public function destroy(Deal $deal)
    {
        $response = $this->ajaxDispatch(new DeleteDeal($deal));

        $response['redirect'] = route('crm.deals.index');

        if ($response['success']) {
            $message = trans('messages.success.deleted', ['type' => trans_choice('crm::general.deals', 1)]);

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    public function getContactCompany(IrregularRequest $request)
    {
        if ($request['crm_contact_id']){
            $contacts = CompanyContact::where('crm_contact_id', $request['crm_contact_id'])->get();

            foreach($contacts as $key => $contact){
                $items[$key] = $contact->company->name;
            }
        } else {
            $items = Company::with('company')->enabled()->get()->pluck('name', 'id');
        }

        return response()->json(['data' => $items]);
    }

    public function getCompanyContact(IrregularRequest $request)
    {
        if ($request['crm_company_id']) {
            $companies = CompanyContact::where('crm_company_id', $request['crm_company_id'])->get();

            foreach($companies as $key => $company){
                $items[$key] = $company->contact->name;
            }
        } else {
            $items = Contact::with('contact')->enabled()->get()->pluck('name', 'id');
        }

        return response()->json(['data' => $items]);
    }

    /**
     * Export the specified resource.
     *
     * @return Response
     */
    public function export()
    {
        return $this->exportExcel(new Export, trans_choice('crm::general.deals', 2));
    }

    public function won(Deal $deal)
    {
        $response = $this->ajaxDispatch(new UpdateDeal($deal, request()->merge(['status' => "won"])));

        if ($response['success']) {
            $response['message'] = trans('crm::general.invoice_created');
        }

        return response()->json($response);
    }

    public function lost(Deal $deal)
    {
        $response = $this->ajaxDispatch(new UpdateDeal($deal, request()->merge(['status' => "lost"])));

        if ($response['success']) {
            $response['message'] = trans('crm::general.deal_is_broken');
        }

        return response()->json($response);
    }

    public function reopen(Deal $deal)
    {
        $response = $this->ajaxDispatch(new UpdateDeal($deal, request()->merge(['status' => "open"])));

        if ($response['success']) {
            $response['message'] = trans('crm::general.deal_is_reopen');
        }

        return response()->json($response);
    }

    public function stage(Deal $deal, $stage_id)
    {
        $response = $this->ajaxDispatch(new UpdateDeal($deal, request()->merge(['stage_id' => $stage_id])));

        if ($response['success']) {
            $response['message'] = trans('crm::general.deal_status_change');
        }

        return response()->json($response);
    }

    public function done(DealActivity $activity)
    {
        $response = $this->ajaxDispatch(new UpdateDealActivity($activity, request()->merge(['done' => true])));

        if ($response['success']) {
            $response['message'] = trans('crm::general.deal_is_broken');
        }

        return redirect()->back();
    }
}
