<?php

namespace Modules\Inventory\Http\Controllers;

use App\Models\Common\Item;
use App\Models\Common\Company;
use App\Abstracts\Http\Controller;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Models\TransferOrder;
use Illuminate\Http\Request as IlluminateRequest;
use Modules\Inventory\Traits\Inventory as TOrder;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Http\Requests\TransferOrder as Request;
use Modules\Inventory\Jobs\TransferOrders\CreateTransferOrder;
use Modules\Inventory\Jobs\TransferOrders\DeleteTransferOrder;
use Modules\Inventory\Jobs\TransferOrders\UpdateTransferOrder;
use Modules\Inventory\Jobs\TransferOrders\TransferOrderCancelled;
use Modules\Inventory\Jobs\TransferOrders\TransferOrderTransferred;
use Modules\Inventory\Jobs\TransferOrders\CreateTransferOrderHistory;

class TransferOrders extends Controller
{
    use TOrder;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $transfer_orders = TransferOrder::collect();

        return $this->response('inventory::transfer-orders.index', compact('transfer_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $number = $this->getNextTransferOrderNumber();

        $warehouses = Warehouse::enabled()->pluck('name', 'id');

        return view('inventory::transfer-orders.create', compact('warehouses', 'number'));
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
        $response = $this->ajaxDispatch(new CreateTransferOrder($request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.transfer-orders.show', $response['data']->id);

            $message = trans('messages.success.added', ['type' => trans_choice('inventory::general.transfer_orders', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.transfer-orders.create');

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
    public function show(TransferOrder $transfer_order)
    {
        $logo = $this->getLogo($logo = null);

        return view('inventory::transfer-orders.show', compact('transfer_order', 'logo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  TransferOrder $transfer_order
     *
     * @return Response
     */
    public function edit(TransferOrder $transfer_order)
    {
        $warehouses = Warehouse::enabled()->pluck('name', 'id');

        $transfer_order_items = $transfer_order->transfer_order_items;

        return view('inventory::transfer-orders.edit', compact('transfer_order', 'transfer_order_items', 'warehouses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TransferOrder $transfer_order
     * @param  Request $request
     *
     * @return Response
     */
    public function update(TransferOrder $transfer_order, Request $request)
    {
        $response = $this->ajaxDispatch(new UpdateTransferOrder($transfer_order, $request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.transfer-orders.show', $response['data']->id);

            $message = trans('messages.success.updated', ['type' => $transfer_order->transfer_order]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.transfer-orders.edit', $transfer_order->id);

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TransferOrder $transfer_order
     *
     * @return Response
     */
    public function destroy(TransferOrder $transfer_order)
    {
        $response = $this->ajaxDispatch(new DeleteTransferOrder($transfer_order));

        $response['redirect'] = route('inventory.transfer-orders.index');

        if ($response['success']) {
            $message = trans('messages.success.deleted', ['type' => $transfer_order->transfer_order]);

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    public function getSourceItem(IlluminateRequest $request)
    {
        $items = [];

        $warehouse_items = InventoryItem::where('warehouse_id', $request['warehouse_id'])->get();

        foreach($warehouse_items as $warehouse_item){
            $item = Item::firstWhere('id', $warehouse_item->item_id);

            $items[$item->id] = $item->name;
        }

        $destination_warehouses = Warehouse::enabled()->pluck('name', 'id');

        if (!empty($request['warehouse_id'])){
            unset( $destination_warehouses[$request['warehouse_id']]);
        }

        return response()->json([
            'data' => [
                'items' => $items,
                'destination_warehouses' => $destination_warehouses
            ],
        ]);
    }

    public function getItemQuantity(IlluminateRequest $request)
    {
        $quantity = InventoryItem::where('warehouse_id', $request['warehouse_id'])->where('item_id', $request['item_id'])->value('opening_stock');

        return response()->json(['data' => $quantity]);
    }

    public function ready($transfer_order)
    {
        $ready = TransferOrder::where('id', $transfer_order)->update(['status' => 'ready']);

        $user = user();

        if (empty($user)) {
            $company = Company::find($this->transfer_order->company_id);
            $user = $company->users()->first();
        }

        $history = [
            'company_id'        => company_id(),
            'created_by'        => $user->id,
            'transfer_order_id' => $transfer_order,
            'status'            => 'ready'
        ];

        $this->ajaxDispatch(new CreateTransferOrderHistory($transfer_order));

        return redirect()->route('inventory.transfer-orders.show', $transfer_order);
    }

    public function inTransfer($transfer_order)
    {
        $in_transfer = TransferOrder::where('id', $transfer_order)->update(['status' => 'in_transfer']);

        $user = user();

        if (empty($user)) {
            $company = Company::find($this->transfer_order->company_id);
            $user = $company->users()->first();
        }

        $history = [
            'company_id'        => company_id(),
            'created_by'        => $user->id,
            'transfer_order_id' => $transfer_order,
            'status'            => 'in_transfer'
        ];

        $this->ajaxDispatch(new CreateTransferOrderHistory($transfer_order));

        return redirect()->route('inventory.transfer-orders.show', $transfer_order);
    }

    public function transferred($transfer_order)
    {
        $response = $this->ajaxDispatch(new TransferOrderTransferred($transfer_order));

        if ($response['success']) {
            $message = trans('messages.success.added', ['type' => trans_choice('inventory::general.transfer_orders', 1)]);

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error()->important();
        }

        return redirect()->route('inventory.transfer-orders.show', $transfer_order);
    }

    public function cancelled($transfer_order)
    {
        $response = $this->ajaxDispatch(new TransferOrderCancelled($transfer_order));

        if ($response['success']) {
            $message = trans('messages.success.added', ['type' => trans_choice('inventory::general.transfer_orders', 1)]);

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error()->important();
        }

        return redirect()->route('inventory.transfer-orders.show', $transfer_order);
    }

    /**
     * Print the transfer order.
     *
     * @param  TransferOrder $transfer_order
     *
     * @return Response
    */
    public function printTransferOrder(TransferOrder $transfer_order)
    {
        $logo = $this->getLogo($logo = null);

        $view = view('inventory::transfer-orders.print', compact('transfer_order', 'logo'));

        return mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');
    }

    /**
     * Download the PDF file of transfer order.
     *
     * @param  TransferOrder $transfer_order
     *
     * @return Response
     */
    public function pdfTransferOrder(TransferOrder $transfer_order)
    {
        $logo = $this->getLogo($logo = null);

        $view = view('inventory::transfer-orders.print', compact('transfer_order', 'logo'))->render();
        $html = mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');

        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($html);

        $file_name = $this->getTransferOrderFileName($transfer_order);

        return $pdf->download($file_name);
    }
}
