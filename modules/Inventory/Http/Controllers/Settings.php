<?php

namespace Modules\Inventory\Http\Controllers;

use App\Abstracts\Http\Controller;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Http\Requests\Setting as Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Response;

class Settings extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit()
    {
        foreach (json_decode(setting('inventory.units')) as $key => $value) {
            $items[$key] = ['unit_value' => $value];

            if ($value == setting('inventory.default_unit')) {
                $items[$key] += ['default_unit' => '1'];
            } else {
                $items[$key] += ['default_unit' => '0'];
            }
        }

        foreach (json_decode(setting('inventory.reasons')) as $key => $value) {
           $reasons[$key] = ['reason_value' => $value];
        }

        $warehouses = Warehouse::enabled()->pluck('name', 'id');

        $barcode_type = ['TYPE_CODE_128', 'TYPE_CODE_39', 'TYPE_EAN_13'];

        return view('inventory::settings.edit', compact('items', 'reasons', 'warehouses', 'barcode_type'));
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
        $units = $this->checkTables('unit', $request);

        if (is_string($units)) {
            flash($units)->error()->important();

            return response()->json([
                'success' => false,
                'error' => true,
                'redirect' => route('inventory.settings.edit'),
                'data' => [],
            ]);
        } else {
            foreach ($request['items'] as $key => $value) {
                if ($value['default_unit'] == "1") {
                    $default_unit = $value['unit_value'];
                }
            }
        }

        $reasons = $this->checkTables('reason', $request);

        if (is_string($reasons)) {
            flash($reasons)->error()->important();

            return response()->json([
                'success' => false,
                'error' => true,
                'redirect' => route('inventory.settings.edit'),
                'data' => [],
            ]);
        }

        setting()->set('inventory.adjustment_prefix', $request['adjustment_prefix']);
        setting()->set('inventory.adjustment_next', $request['adjustment_next']);
        setting()->set('inventory.adjustment_digit', $request['adjustment_digit']);
        setting()->set('inventory.barcode_type', $request['barcode_type']);
        setting()->set('inventory.transfer_order_prefix', $request['transfer_order_prefix']);
        setting()->set('inventory.transfer_order_next', $request['transfer_order_next']);
        setting()->set('inventory.transfer_order_digit', $request['transfer_order_digit']);
        setting()->set('inventory.default_warehouse', $request['default_warehouse']);
        setting()->set('inventory.negatif_stock', $request['negatif_stock']);
        setting()->set('inventory.reorder_level_notification', $request['reorder_level_notification']);
        setting()->set('inventory.track_inventory', $request['track_inventory']);
        setting()->set('inventory.default_unit', isset($default_unit)? $default_unit : null);
        setting()->set('inventory.units', json_encode((object) $units));
        setting()->set('inventory.reasons', json_encode((object) $reasons));
        setting()->save();

        if (config('setting.cache.enabled')) {
            Cache::forget(setting()->getCacheKey());
        }

        $response = [
            'success' => true,
            'error' => false,
            'redirect' => route('settings.index'),
            'data' => [],
        ];

        if ($response['success']) {

            $message = trans('messages.success.updated', ['type' => trans_choice('general.settings', 2)]);

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    public function checkTables($type, $request)
    {
        $result = [];

        $request_key = $type == 'unit' ? 'items' : 'reasons';

        if (!isset($request[$request_key])) {
            return trans('inventory::settings.error.' . $type . '_null');
        } else {
            foreach ($request[$request_key] as $key => $value) {
                if ($value[$type . '_value'] == null) {
                    return trans('inventory::settings.error.' . $type . '_empty');
                }

                $result += [$key => $value[$type . '_value']];
            }
        }
        return $result;
    }
}
