<?php

namespace Modules\SalesPurchaseOrders\Http\Controllers\Modals;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Setting\Setting as Request;
use Illuminate\Http\JsonResponse;

class SalesOrderTemplate extends Controller
{
    public $skip_keys = ['company_id', '_method', '_token', '_prefix', '_template'];

    public function __construct()
    {
        $this->middleware('permission:update-sales-purchase-orders-settings-purchase-order')->only('update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $fields = $request->all();
        $prefix = $request->get('_prefix', 'sales-purchase-orders.sales_order');

        foreach ($fields as $key => $value) {
            $real_key = $prefix . '.' . $key;

            // Don't process unwanted keys
            if (in_array($key, $this->skip_keys)) {
                continue;
            }

            setting()->set($real_key, $value);
        }

        // Save all settings
        setting()->save();

        $message = trans('messages.success.updated', ['type' => trans_choice('general.settings', 2)]);

        $response = [
            'status'   => null,
            'success'  => true,
            'error'    => false,
            'message'  => $message,
            'data'     => null,
            'redirect' => route('sales-purchase-orders.settings.sales-order.edit'),
        ];

        flash($message)->success();

        return response()->json($response);
    }
}
