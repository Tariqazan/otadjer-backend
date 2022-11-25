<?php

namespace Modules\Crm\Http\Controllers\Modals;

use App\Abstracts\Http\Controller;
use Modules\Crm\Models\Email;
use Modules\Crm\Models\Company;
use Modules\Crm\Models\Contact;
use Modules\Crm\Models\Deal;
use Modules\Crm\Jobs\CreateEmail;
use Modules\Crm\Jobs\DeleteEmail;
use Modules\Crm\Jobs\UpdateEmail;
use Modules\Crm\Notifications\Email as Notification;
use Illuminate\Http\Request as Request;

class Emails extends Controller
{
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

    public function index($type, $type_id, $id)
    {
        $response = [
            'success' => true,
            'error' => false,
            'data' => null,
            'message' => '',
            'title' => 'Show Emails',
            'html' => 'Test Emailsss'
        ];

        return response()->json($response);
    }

    public function show($type, $type_id, $id)
    {
        $email = Email::find($id);

        $html = view('crm::modals.emails.show', compact('email'))->render();

        $response = [
            'success' => true,
            'error' => false,
            'data' => $email,
            'message' => 'Result email details',
            'title' => trans('crm::general.modal.title', ['field' => trans_choice('crm::general.emails', 1)]),
            'html' => $html
        ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $type = $request->get('type', 'item');

        $html = view('modals.categories.create', compact('type'))->render();

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
     * @param  $request
     * @return Response
     */
    public function store($type, $type_id, Request $request)
    {
        $request['id'] = $type_id;
        $request['type'] = $type;
        $request['created_by'] = user()->id;
        $request['company_id'] = company_id();
        $request['from'] = user()->email;

        $response = $this->ajaxDispatch(new CreateEmail($request));

        $route = 'crm.' . $type . '.show';

        if ($response['success']) {
            $response['redirect'] = route($route, $type_id);

            $message = trans('messages.success.added', ['type' => trans_choice('crm::general.emails', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route($route, $type_id);

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Email $email
     *
     * @return Response
     */
    public function edit($type, $type_id, Email $email)
    {
        $html = view('crm::modals.emails.edit', compact('email', 'type', 'type_id'))->render();

        return response()->json([
            'success' => true,
            'error' => false,
            'title' => trans('crm::general.modal.edit.title', ['field' => trans_choice('crm::general.emails', 1)]),
            'message' => 'Email edit page',
            'html' => $html,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Email $email
     * @param  Request $request
     *
     * @return Response
     */
    public function update($type, $type_id, Email $email, Request $request)
    {
        $response = $this->ajaxDispatch(new UpdateEmail($email, $request));

        if ($response['success']) {
            $message = trans('messages.success.updated', ['type' => trans_choice('crm::general.emails', 1)]);

            $response['message'] = $message;
        }

        return response()->json($response);
    }

    public function send($class_name, $class_id, $type_id)
    {
        $response = [];
        $email = Email::find(request()->segment(8));

        try {
            if ($email->emailable_type == 'Modules\Crm\Models\Contact') {
                $send_contact = Contact::find($email->emailable_id);
                $send_contact->contact->email = $email->to;
            } elseif ($email->emailable_type == 'Modules\Crm\Models\Company') {
                $send_contact = Company::find($email->emailable_id);
                $send_contact->contact->email = $email->to;
            } elseif ($email->emailable_type == 'Modules\Crm\Models\Deal') {
                $send_contact = Deal::find($email->emailable_id);
                $send_contact->contact->email = $email->to;
            }

            $send = $send_contact->contact->notify(new Notification($email));

            $email->send = 1;
            $email->update();

            $response = [
                'success' => true,
                'error'   => false,
                'message' => trans('crm::general.send_mail')
            ];

        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'error'   => true,
                'message' => $e
            ];
        }

        $response['redirect'] = route('crm.' . $class_name . '.show', $email->emailable_id);

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Email $email
     *
     * @return Response
     */
    public function destroy($type, $type_id, Email $email)
    {
        $response = $this->ajaxDispatch(new DeleteEmail($email));

        if ($response['success']) {
            $message = trans('messages.success.deleted', ['type' => trans_choice('crm::general.emails', 1)]);

            $response['message'] = $message;
        }

        return response()->json($response);
    }
}
