<?php

namespace Modules\Crm\Http\Controllers\Modals;

use App\Abstracts\Http\Controller;
use App\Traits\DateTime;
use App\Jobs\Common\CreateContact;
use App\Models\Common\Company;
use Modules\Crm\Http\Requests\Company as Request;
use Modules\Crm\Jobs\CreateCompany as CreateCrmCompany;
use Modules\Crm\Models\Contact;
use Modules\Crm\Traits\Contacts as ContactsTrait;

class Companies extends Controller
{
    use  ContactsTrait, DateTime;

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

        $crm_contact = Contact::all()->pluck('name', 'id');

        $users = Company::find($company_id)->users()->pluck('name', 'id');

        $stages = $this->getStages();

        $sources = $this->getSources();

        $html = view('crm::modals.company.create', compact('crm_contact', 'users', 'stages', 'sources'))->render();

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
     * @param  Request  $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $response = $this->ajaxDispatch(new CreateContact($request));

        if ($response['success']) {
            $company = $response['data'];

            $request['contact_id'] = $company->id;
            $request['created_by'] = user()->id;

            $response['data'] = $this->dispatch(new CreateCrmCompany($request));
            $response['data']->name = $company->name;

            $response['message'] = trans('messages.success.added', ['type' => trans_choice('crm::general.companies', 1)]);
        }

        return response()->json($response);
    }
}
