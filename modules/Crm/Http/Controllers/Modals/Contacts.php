<?php

namespace Modules\Crm\Http\Controllers\Modals;

use App\Abstracts\Http\Controller;
use App\Traits\DateTime;
use App\Models\Common\Company;
use Modules\Crm\Http\Requests\Contact as Request;
use App\Jobs\Common\CreateContact;
use Modules\Crm\Jobs\CreateContact as CreateCrmContact;
use Modules\Crm\Models\Company as CrmCompany;
use Modules\Crm\Traits\Contacts as ContactsTrait;

class Contacts extends Controller
{
    use ContactsTrait, DateTime;

    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        // Add CRUD permission check
        $this->middleware('permission:create-settings-categories')->only(['create', 'store', 'duplicate', 'import']);
        $this->middleware('permission:read-settings-categories')->only(['index', 'show', 'edit', 'export']);
        $this->middleware('permission:update-settings-categories')->only(['update', 'enable', 'disable']);
        $this->middleware('permission:delete-settings-categories')->only('destroy');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $company_id = company_id();

        $crm_company = CrmCompany::all()->pluck('name', 'id');

        $users = Company::find($company_id)->users()->pluck('name', 'id');

        $stages = $this->getStages();

        $sources = $this->getSources();

        $html = view('crm::modals.contact.create', compact('users', 'crm_company', 'stages', 'sources'))->render();

        return response()->json([
            'success' => true,
            'error' => false,
            'message' => 'null',
            'html' => $html,
        ]);
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

            $response['data'] = $this->dispatch(new CreateCrmContact($request));
            $response['data']->name = $contact->name;

            $response['message'] = trans('messages.success.added', ['type' => trans_choice('crm::general.contacts', 1)]);
        }

        return response()->json($response);
    }
}
