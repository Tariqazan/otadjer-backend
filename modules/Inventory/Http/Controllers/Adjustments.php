<?php

namespace Modules\Inventory\Http\Controllers;

use App\Models\Common\Item;
use App\Abstracts\Http\Controller;
use Illuminate\Http\Request as IlluminateRequest;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Models\Adjustment;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Jobs\Adjustments\CreateAdjustment;
use Modules\Inventory\Jobs\Adjustments\DeleteAdjustment;
use Modules\Inventory\Jobs\Adjustments\UpdateAdjustment;
use Modules\Inventory\Http\Requests\Adjustment as Request;
use Modules\Inventory\Traits\Inventory as AdjustmentNumber;

class Adjustments extends Controller
{
    use AdjustmentNumber;

    /**
     * Display a listing of the resource.
     *
     * @return Response
    */
    public function index()
    {
        $adjustments = Adjustment::collect();

        return $this->response('inventory::adjustments.index', compact('adjustments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $adjustment_number = $this->getNextAdjustmentNumber();

        $warehouses = Warehouse::enabled()->pluck('name', 'id');

        foreach (json_decode(setting('inventory.reasons')) as $key => $value) {
            $reasons[$value] = $value;
        }

        return view('inventory::adjustments.create', compact('reasons', 'warehouses', 'adjustment_number'));
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
        $response = $this->ajaxDispatch(new CreateAdjustment($request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.adjustments.show', $response['data']->id);

            $message = trans('messages.success.added', ['type' => trans_choice('inventory::general.adjustments', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.adjustments.create');

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Adjustment $adjustment
     *
     * @return Response
     */
    public function edit(Adjustment $adjustment)
    {
        $warehouses = Warehouse::enabled()->pluck('name', 'id');

        $adjustment_items = $adjustment->adjustment_items;

        foreach (json_decode(setting('inventory.reasons')) as $key => $value) {
            $reasons[$value] = $value;
        }

        return view('inventory::adjustments.edit', compact('reasons', 'adjustment', 'warehouses', 'adjustment_items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Adjustment $adjustment
     * @param  Request $request
     *
     * @return Response
     */
    public function update(Adjustment $adjustment, Request $request)
    {
        $response = $this->ajaxDispatch(new UpdateAdjustment($adjustment, $request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.adjustments.show', $response['data']->id);

            $message = trans('messages.success.updated', ['type' => $adjustment->adjustment_number]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.adjustments.edit', $adjustment->id);

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Adjustment $adjustment
     *
     * @return Response
     */
    public function destroy(Adjustment $adjustment)
    {
        $response = $this->ajaxDispatch(new DeleteAdjustment($adjustment));

        $response['redirect'] = route('inventory.adjustments.index');

        if ($response['success']) {
            $message = trans('messages.success.deleted', ['type' => $adjustment->adjustment_number]);

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @return Response
     */
    public function show(Adjustment $adjustment)
    {
        $logo = $this->getLogo($logo = null);

        return view('inventory::adjustments.show', compact('adjustment', 'logo'));
    }

    public function getItems(IlluminateRequest $request)
    {
        $items = [];

        $warehouse_items = InventoryItem::where('warehouse_id', $request['warehouse_id'])->get();

        foreach($warehouse_items as $warehouse_item){
            $item = Item::firstWhere('id', $warehouse_item->item_id);

            if (! $item){
                continue;
            }

            $items[$item->id] = $item->name;
        }

        return response()->json(['data' => $items]);
    }

    public function getQuantity(IlluminateRequest $request)
    {
        $quantity = InventoryItem::where('warehouse_id', $request['warehouse_id'])->where('item_id', $request['item_id'])->value('opening_stock');

        return response()->json(['data' => $quantity]);
    }

        /**
     * Print the transfer order.
     *
     * @param  Adjustment $adjustment
     *
     * @return Response
    */
    public function printAdjustment(Adjustment $adjustment)
    {
        $logo = $this->getLogo($logo = null);

        $view = view('inventory::adjustments.print', compact('adjustment', 'logo'));

        return mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');
    }

    /**
     * Download the PDF file of transfer order.
     *
     * @param  Adjustment $adjustment
     *
     * @return Response
     */
    public function pdfAdjustment(Adjustment $adjustment)
    {
        $logo = $this->getLogo($logo = null);

        $view = view('inventory::adjustments.print', compact('adjustment', 'logo'))->render();
        $html = mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');

        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);

        $file_name = $this->getAdjustmentFileName($adjustment);

        return $pdf->download($file_name);
    }
}
