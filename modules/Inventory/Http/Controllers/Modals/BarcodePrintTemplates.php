<?php

namespace Modules\Inventory\Http\Controllers\Modals;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Setting\Setting as Request;

class BarcodePrintTemplates extends Controller
{
    public $skip_keys = ['company_id', '_method', '_token', '_prefix', '_template'];

    public function __construct()
    {
        // Add CRUD permission check
        $this->middleware('permission:create-inventory-settings')->only('create', 'store');
        $this->middleware('permission:read-inventory-settings')->only('index', 'edit');
        $this->middleware('permission:update-inventory-settings')->only('update', 'enable', 'disable');
        $this->middleware('permission:delete-inventory-settings')->only('destroy');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function update(Request $request)
    {
        setting()->set('inventory.barcode_print_template', $request['barcode_print_template']);
        setting()->save();

        $message = trans('messages.success.updated', ['type' => trans_choice('general.settings', 2)]);

        $response = [
            'status' => null,
            'success' => true,
            'error' => false,
            'message' => $message,
            'data' => null,
            'redirect' => route('inventory.settings.edit'),
        ];

        flash($message)->success();

        return response()->json($response);
    }
}
