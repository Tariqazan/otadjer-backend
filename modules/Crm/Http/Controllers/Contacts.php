<?php

namespace Modules\Crm\Http\Controllers;

use App\Abstracts\Http\Controller;
use App\Traits\DateTime;
use App\Models\Common\Company;
use App\Http\Requests\Common\Import as ImportRequest;
use App\Jobs\Common\CreateContact;
use App\Jobs\Common\DeleteContact;
use App\Jobs\Common\UpdateContact;
use Illuminate\Http\JsonResponse;
use Modules\Crm\Exports\Contacts\Contacts as Export;
use Modules\Crm\Http\Requests\Contact as Request;
use Modules\Crm\Imports\Contacts\Contacts as Import;
use Modules\Crm\Jobs\CreateContact as CreateCrmContact;
use Modules\Crm\Jobs\DeleteContact as DeleteCrmContact;
use Modules\Crm\Jobs\UpdateContact as UpdateCrmContact;
use Modules\Crm\Models\Contact;
use Modules\Crm\Models\Company as CrmCompany;
use Modules\Crm\Traits\Activities;
use Modules\Crm\Traits\Contacts as ContactsTrait;
use Modules\Crm\Traits\Main;

class Contacts extends Controller
{
    use Activities, ContactsTrait, DateTime, Main;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        foreach (user()->roles as $role) {
            $user_roles[] = $role->display_name ;
        }

        if (in_array('Admin', $user_roles)) {
            $contacts = Contact::with('contact')->collect('contact.name');
        } else {
            $contacts = Contact::where('owner_id', user()->id)->with('contact')->collect('contact.name');
        }

        return view('crm::contacts.index', compact('contacts'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @param  Contact  $contact
     *
     * @return Response
     */
    public function show(Contact $contact)
    {
        $activities = $this->getActivitiesByClass($contact);

        $schedule_types = $this->getScheduleTypes();

        $log_types = $this->getLogTypes();

        $user = user();

        $users = Company::find(company_id())->users()->pluck('name', 'id');

        return view('crm::contacts.show', compact('contact', 'activities', 'schedule_types', 'log_types', 'users', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $company_id = company_id();

        foreach(user()->roles as $role) {
            $user_roles[] = $role->display_name ;
        }

        if (in_array('Admin', $user_roles)) {
            $crm_company = CrmCompany::all()->pluck('name', 'id');

        } else {
            $crm_company = CrmCompany::where('owner_id', user()->id)->get()->pluck('name', 'id');
        }

        $users = Company::find($company_id)->users()->pluck('name', 'id');

        $stages = $this->getStages();

        $sources = $this->getSources();

        return view('crm::contacts.create', compact('users', 'crm_company', 'stages', 'sources'));
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
        $response = $this->ajaxDispatch(new CreateContact($request));

        if ($response['success']) {
            $contact = $response['data'];

            $request['contact_id'] = $contact->id;
            $request['created_by'] = user()->id;

            $crm_contact = $this->dispatch(new CreateCrmContact($request));

            $response['redirect'] = route('crm.contacts.index');

            $message = trans('messages.success.added', ['type' => trans_choice('crm::general.contacts', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('crm.contacts.create');

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Duplicate the specified resource.
     *
     * @param  Contact $contact
     *
     * @return Response
     */
    public function duplicate(Contact $contact)
    {
        $clone = $contact->duplicate();

        $message = trans('messages.success.duplicated', ['type' => trans_choice('crm::general.contacts', 1)]);

        flash($message)->success();

        return redirect()->route('crm.contacts.edit', $clone->id);
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
        $response = $this->importExcel(new Import, $request, trans_choice('crm::general.contacts', 2));

        if ($response['success']) {
            $response['redirect'] = route('crm.contacts.index');

            flash($response['message'])->success();
        } else {
            $response['redirect'] = route('import.create', ['crm', 'contacts']);

            flash($response['message'])->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Contact $customer
     *
     * @return Response
     */
    public function edit(Contact $contact)
    {
        $company_id = company_id();

        foreach(user()->roles as $role) {
            $user_roles[] = $role->display_name ;
        }

        if (in_array('Admin', $user_roles)) {
            $crm_company = CrmCompany::all()->pluck('name', 'id');

        } else {
            $crm_company = CrmCompany::where('owner_id', user()->id)->get()->pluck('name', 'id');
        }

        $users = Company::find($company_id)->users()->pluck('name', 'id');

        $stages = $this->getStages();

        $sources = $this->getSources();

        return view('crm::contacts.edit', compact('contact', 'users', 'stages', 'sources', 'crm_company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Contact $contact
     * @param  Request $request
     *
     * @return Response
     */
    public function update(Contact $contact, Request $request)
    {
        $response = $this->ajaxDispatch(new UpdateContact($contact->contact, $request));

        if ($response['success']) {
            $request['contact_id'] = $contact->contact->id;
            $request['created_by'] = user()->id;

            $crm_contact = $this->dispatch(new UpdateCrmContact($contact, $request));

            $response['redirect'] = route('crm.contacts.index');

            $message = trans('messages.success.updated', ['type' => $contact->contact->name]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('crm.contacts.edit', $contact->id);

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Enable the specified resource.
     *
     * @param  Contact $contact
     *
     * @return Response
     */
    public function enable(Contact $contact)
    {
        $response = $this->ajaxDispatch(new UpdateContact($contact->contact, request()->merge(['enabled' => 1])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.enabled', ['type' => $contact->name]);
        }

        return response()->json($response);
    }

    /**
     * Disable the specified resource.
     *
     * @param  Contact $contact
     *
     * @return Response
     */
    public function disable(Contact $contact)
    {
        $response = $this->ajaxDispatch(new UpdateContact($contact->contact, request()->merge(['enabled' => 0])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.disabled', ['type' => $contact->name]);
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Contact $contact
     *
     * @return Response
     */
    public function destroy(Contact $contact)
    {
        $contact_name = $contact->contact->name;

        $response = $this->ajaxDispatch(new DeleteContact($contact->contact));

        $crm_response = $this->dispatch(new DeleteCrmContact($contact));

        $response['redirect'] = route('crm.contacts.index');

        if ($response['success']) {
            $message = trans('messages.success.deleted', ['type' => $contact_name]);

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Export the specified resource.
     *
     * @return Response
     */
    public function export()
    {
        return $this->exportExcel(new Export, trans_choice('crm::general.contacts', 2));
    }
}
