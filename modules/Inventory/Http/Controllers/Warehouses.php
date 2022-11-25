<?php

namespace Modules\Inventory\Http\Controllers;

use App\Abstracts\Http\Controller;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Jobs\Warehouses\CreateWarehouse;
use Modules\Inventory\Jobs\Warehouses\DeleteWarehouse;
use Modules\Inventory\Jobs\Warehouses\UpdateWarehouse;
use App\Http\Requests\Common\Import as ImportRequest;
use Modules\Inventory\Http\Requests\Warehouse as Request;
use Modules\Inventory\Exports\Warehouses\Warehouses as Export;
use Modules\Inventory\Exports\Show\Warehouses\Show as ExportShow;
use Modules\Inventory\Exports\Show\Warehouses\Stock as ExportStock;
use Modules\Inventory\Exports\Show\Warehouses\Histories as ExportHistories;
use Modules\Inventory\Imports\Warehouses\Warehouses as Import;

class Warehouses extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $warehouses = Warehouse::collect();

        return $this->response('inventory::warehouses.index', compact('warehouses'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @return Response
     */
    public function show(Warehouse $warehouse)
    {
        return view('inventory::warehouses.show', compact('warehouse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory::warehouses.create');
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
        $response = $this->ajaxDispatch(new CreateWarehouse($request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.warehouses.index');

            $message = trans('messages.success.added', ['type' => trans_choice('inventory::general.warehouses', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.warehouses.create');

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Duplicate the specified resource.
     *
     * @param  Warehouse  $warehouse
     *
     * @return Response
     */
    public function duplicate(Warehouse $warehouse)
    {
        $clone = $warehouse->duplicate();

        $message = trans('messages.success.duplicated', ['type' => trans_choice('inventory::general.warehouses', 1)]);

        flash($message)->success();

        return redirect()->route('inventory.warehouses.edit', $clone->id);
    }

    /**
     * Import the specified resource.
     *
     * @param  ImportRequest  $request
     *
     * @return Response
     */
    public function import(ImportRequest $request)
    {
        $response = $this->importExcel(new Import, $request, trans_choice('inventory::general.warehouses', 2));

        if ($response['success']) {
            $response['redirect'] = route('inventory.warehouses.index');

            flash($response['message'])->success();
        } else {
            $response['redirect'] = route('import.create', ['inventory', 'warehouses']);

            flash($response['message'])->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Warehouse  $warehouse
     *
     * @return Response
     */
    public function edit(Warehouse $warehouse)
    {
        return view('inventory::warehouses.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Warehouse  $warehouse
     * @param  Request  $request
     *
     * @return Response
     */
    public function update(Warehouse $warehouse, Request $request)
    {
        $response = $this->ajaxDispatch(new UpdateWarehouse($warehouse, $request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.warehouses.index');

            $message = trans('messages.success.updated', ['type' => $warehouse->name]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.warehouses.edit', $warehouse->id);

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Enable the specified resource.
     *
     * @param  Warehouse  $warehouse
     *
     * @return Response
     */
    public function enable(Warehouse $warehouse)
    {
        $response = $this->ajaxDispatch(new UpdateWarehouse($warehouse, request()->merge(['enabled' => 1])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.enabled', ['type' => $warehouse->name]);
        }

        return response()->json($response);
    }

    /**
     * Disable the specified resource.
     *
     * @param  Warehouse  $warehouse
     *
     * @return Response
     */
    public function disable(Warehouse $warehouse)
    {
        $response = $this->ajaxDispatch(new UpdateWarehouse($warehouse, request()->merge(['enabled' => 0])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.disabled', ['type' => $warehouse->name]);
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Warehouse  $warehouse
     *
     * @return Response
     */
    public function destroy(Warehouse $warehouse)
    {
        $default_warehouse = setting('inventory.default_warehouse');

        if ($default_warehouse == $warehouse->id) {

            $message =  trans('inventory::warehouses.default_warehouse_delete');

            flash($message)->error()->important();

        } else{
            $response = $this->ajaxDispatch(new DeleteWarehouse($warehouse));

            if ($response['success']) {
                $message = trans('messages.success.deleted', ['type' => $warehouse->name]);

                flash($message)->success();
            } else {
                $message = $response['message'];

                flash($message)->error()->important();
            }
        }

        $response['redirect'] = route('inventory.warehouses.index');

        return response()->json($response);
    }

    /**
     * Export the specified resource.
     *
     * @return Response
     */
    public function export()
    {
        return $this->exportExcel(new Export, trans_choice('inventory::general.warehouses', 2));
    }

    /**
     * Export the specified resource.
     *
     * @return Response
     */
    public function exportStock()
    {
        return $this->exportExcel(new ExportStock, trans_choice('inventory::general.warehouses', 2) . ' ' . trans('inventory::general.stock'));
    }

    /**
     * Export the specified resource.
     *
     * @return Response
     */
    public function exportHistory()
    {
        return $this->exportExcel(new ExportHistories, trans_choice('inventory::general.warehouses', 2) . ' ' . trans_choice('inventory::general.histories', 2), );
    }

    /**
     * Export the specified resource.
     *
     * @return Response
     */
    public function exportShow()
    {
        return $this->exportExcel(new ExportShow, trans_choice('inventory::general.warehouses', 2) . ' ' . trans('general.show'));
    }
}
