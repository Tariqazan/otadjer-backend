<?php

namespace Modules\CompositeItems\Http\Controllers;

use App\Traits\Modules;
use App\Models\Common\Item;
use App\Models\Setting\Tax;
use App\Jobs\Common\UpdateItem as CoreUpdateItem;
use App\Models\Setting\Category;
use App\Abstracts\Http\Controller;
use Modules\Inventory\Models\Warehouse;
use Modules\CompositeItems\Models\CompositeItem;
use Illuminate\Http\Request as IlluminateRequest;
use Modules\CompositeItems\Jobs\CreateItem;
use Modules\CompositeItems\Jobs\UpdateItem;
use Modules\CompositeItems\Jobs\DeleteCompositeItem;
use Modules\CompositeItems\Http\Requests\CompositeItem as Request;
use App\Models\Common\Report;

class CompositeItems extends Controller
{
    use Modules;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $composite_items = CompositeItem::collect('item.name');

        foreach ($composite_items as $key => $item) {
            if ($item->composite_items) {
                $stock = null;

                foreach ($item->composite_items as $composite_item) {
                    if (! $this->moduleIsEnabled('inventory')) {
                        continue;
                    }

                    if (! $composite_item->item->inventory()->first()) {
                        continue;
                    }

                    $item_stock = $composite_item->item->inventory()->where('warehouse_id', $composite_item->warehouse_id)->value('opening_stock');
                    
                    $estimate_stock = $item_stock / $composite_item->quantity;

                    if ($stock == null || $stock > $estimate_stock) {
                        $stock = $estimate_stock;
                    }
                }
                $composite_items[$key]->estimate_stock = $stock;
            }
        }

        return $this->response('composite-items::composite-items.index', compact('composite_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $items = Item::enabled()->pluck('name', 'id');

        foreach ($items as $id => $name) {
            $composite_item = CompositeItem::where('item_id', $id)->first();

            if ($composite_item) {
                unset($items[$id]);
            }
        }

        $categories = Category::item()->enabled()->orderBy('name')->take(setting('default.select_limit'))->pluck('name', 'id');

        $taxes = Tax::enabled()->orderBy('name')->get()->pluck('title', 'id');

        $inventory = $this->moduleIsEnabled('inventory');

        if ($inventory) {
            foreach (json_decode(setting('inventory.units')) as $key => $value) {
                $units[$value] = $value;
            }

            $warehouses = Warehouse::enabled()->pluck('name', 'id');

            return view('composite-items::composite-items.create', compact('categories', 'items', 'taxes', 'inventory', 'warehouses', 'units'));
        } else {
            return view('composite-items::composite-items.create', compact('categories', 'items', 'taxes', 'inventory'));
        }
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
        $response = $this->ajaxDispatch(new CreateItem($request));

        if ($response['success']) {
            $response['redirect'] = route('composite-items.composite-items.index');

            $message = trans('messages.success.added', ['type' => trans_choice('composite-items::general.name', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('composite-items.composite-items.create');

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CompositeItem  $composite_item
     *
     * @return Response
     */
    public function edit(CompositeItem $composite_item)
    {
        $composite_items = $composite_item->composite_items;

        $items = Item::enabled()->pluck('name', 'id');

        foreach ($items as $id => $name) {
            $data = CompositeItem::where('item_id', $id)->first();

            if ($data) {
                unset($items[$id]);
            }
        }

        $categories = Category::item()->enabled()->orderBy('name')->take(setting('default.select_limit'))->pluck('name', 'id');

        if ($composite_item->item->category && !$categories->has($composite_item->item->category_id)) {
            $categories->put($composite_item->item->category->id, $composite_item->item->category->name);
        }

        $taxes = Tax::enabled()->orderBy('name')->get()->pluck('title', 'id');

        $inventory = $this->moduleIsEnabled('inventory');

        if ($inventory) {
            foreach (json_decode(setting('inventory.units')) as $key => $value) {
                $units[$value] = $value;
            }

            $warehouses = Warehouse::enabled()->pluck('name', 'id');

            return view('composite-items::composite-items.edit', compact('composite_item', 'categories', 'composite_items', 'items', 'taxes', 'inventory', 'units', 'warehouses'));
        } else {
            return view('composite-items::composite-items.edit', compact('composite_item', 'categories', 'composite_items', 'items', 'taxes', 'inventory'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CompositeItem $composite_item
     * @param  Request $request
     *
     * @return Response
     */
    public function update(CompositeItem $composite_item, Request $request)
    {
        $response = $this->ajaxDispatch(new UpdateItem($composite_item->item, $request));

        if ($response['success']) {
            $response['redirect'] = route('composite-items.composite-items.index');

            $message = trans('messages.success.updated', ['type' => $composite_item->name]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('composite-items.composite-items.edit', $composite_item->id);

            flash($response['message'])->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Enable the specified resource.
     *
     * @param  CompositeItem $composite_item
     *
     * @return Response
     */
    public function enable(CompositeItem $composite_item)
    {
        $item = Item::find($composite_item->item_id);

        $response = $this->ajaxDispatch(new CoreUpdateItem($item, request()->merge(['enabled' => 1])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.enabled', ['type' => $item->name]);
        }

        return response()->json($response);
    }

    /**
     * Disable the specified resource.
     *
     * @param  CompositeItem $composite_item
     *
     * @return Response
     */
    public function disable(CompositeItem $composite_item)
    {
        $item = Item::find($composite_item->item_id);

        $response = $this->ajaxDispatch(new CoreUpdateItem($item, request()->merge(['enabled' => 0])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.disabled', ['type' => $item->name]);
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CompositeItem $composite_item
     *
     * @return Response
     */
    public function destroy(CompositeItem $composite_item)
    {
        $response = $this->ajaxDispatch(new DeleteCompositeItem($composite_item));

        $response['redirect'] = route('composite-items.composite-items.index');

        if ($response['success']) {
            $message = trans('messages.success.deleted', ['type' => $composite_item->name]);

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    public function onSelectItem(IlluminateRequest $request)
    {
        if (isset($request['items']) == false) {
            return;
        }

        $warehouse_ids = $warehouse = [];

        foreach ($request['items'] as $key => $data_item) {
            $data_item = json_decode($data_item);

            if (! $data_item->item_id) {
                continue;
            }

            $item = Item::find($data_item->item_id);

            if (! $item) {
                continue;
            }
    
            $inventory_items = $item->inventory()->get();

            if (! $inventory_items) {
                continue;
            }

            foreach ($inventory_items as $inventory_item) {
                $warehouse_ids[$inventory_item->warehouse_id] = $inventory_item->warehouse->name;
            }

            $warehouse[$key] = $warehouse_ids;
        }

        return response()->json([
            'data' => $warehouse,
        ]);
    }
}
