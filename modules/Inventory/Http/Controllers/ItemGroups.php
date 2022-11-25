<?php

namespace Modules\Inventory\Http\Controllers;

use App\Traits\Uploads;
use App\Models\Common\Item;
use App\Models\Setting\Tax;
use App\Models\Setting\Category;
use App\Abstracts\Http\Controller;
use Modules\Inventory\Models\Variant;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Models\VariantValue;
use Modules\Inventory\Models\ItemGroupItem;
use App\Http\Requests\Common\Import as ImportRequest;
use Modules\Inventory\Jobs\ItemGroups\CreateItemGroup;
use Modules\Inventory\Jobs\ItemGroups\DeleteItemGroup;
use Modules\Inventory\Jobs\ItemGroups\UpdateItemGroup;
use Modules\Inventory\Http\Requests\ItemGroup as Request;
use Modules\Inventory\Exports\ItemGroups\ItemGroups as Export;
use Modules\Inventory\Imports\ItemGroups\ItemGroups as Import;
use Modules\Inventory\Http\Requests\ItemGroupVariantAdd as VariantAddRequest;

class ItemGroups extends Controller
{
    use Uploads;

    /**
     * Display a listing of the resource.
     *
     * @return Response
    */
    public function index()
    {
        $item_groups = ItemGroup::with('category')->collect();

        return $this->response('inventory::item-groups.index', compact('item_groups'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @return Response
    */
    public function show()
    {
        return redirect()->route('inventory.items.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
    */
    public function create()
    {
        $categories = Category::type('item')->enabled()->orderBy('name')->pluck('name', 'id');

        $taxes = Tax::enabled()->orderBy('name')->get()->pluck('title', 'id');

        $variants = Variant::enabled()->orderBy('name')->pluck('name', 'id');

        $warehouses = Warehouse::enabled()->pluck('name', 'id');

        foreach (json_decode(setting('inventory.units')) as $key => $value) {
            $units[$value] = $value;
        }

        return view('inventory::item-groups.create', compact('units', 'categories', 'taxes', 'variants', 'warehouses'));
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
        $response = $this->ajaxDispatch(new CreateItemGroup($request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.item-groups.index');

            $message = trans('messages.success.added', ['type' => trans_choice('inventory::general.item_groups', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.item-groups.create');

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Duplicate the specified resource.
     *
     * @param  ItemGroup  $item_group
     *
     * @return Response
     */
    public function duplicate(ItemGroup $item_group)
    {
        $clone = $item_group->duplicate();

        $message = trans('messages.success.duplicated', ['type' => trans_choice('inventory::general.item_groups', 1)]);

        flash($message)->success();

        return redirect()->route('inventory.item-groups.edit', $clone->id);
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
        $response = $this->importExcel(new Import, $request, trans_choice('inventory::general.item_groups', 2));

        if ($response['success']) {
            $response['redirect'] = route('inventory.item-groups.index');

            flash($response['message'])->success();
        } else {
            $response['redirect'] = route('import.create', ['inventory', 'item-groups']);

            flash($response['message'])->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ItemGroup  $item_group
     *
     * @return Response
     */
    public function edit(ItemGroup $item_group)
    {
        $categories = Category::enabled()->orderBy('name')->type('item')->pluck('name', 'id');

        $taxes = Tax::enabled()->orderBy('name')->get()->pluck('title', 'id');

        $variants = Variant::enabled()->orderBy('name')->pluck('name', 'id');

        $select_variants = $item_group->variants()->get();

        $warehouses = Warehouse::enabled()->pluck('name', 'id');

        foreach ($select_variants as $key => $select_variant) {
            $variant_value_ids = $select_variant->values()
                ->where('variant_id', $select_variant->variant_id)
                ->distinct()
                ->pluck('variant_value_id');

            $select_variants[$key]['variant_value_id'] = $variant_value_ids;
        }

        $items = ItemGroupItem::with(['item', 'inventory_item'])->where('item_group_id', $item_group->id)->get();

        foreach ($items as $key => $item) {
            $items[$key]['variant_id'] = $item->variants()->pluck('variant_id');
            $items[$key]['variant_value_id'] = $item->values()->pluck('variant_value_id');
        }

        foreach (json_decode(setting('inventory.units')) as $key => $value) {
            $units[$value] = $value;
        }

        return view('inventory::item-groups.edit', compact('units', 'item_group', 'categories', 'taxes', 'variants', 'select_variants', 'items', 'warehouses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ItemGroup  $item_group
     * @param  Request  $request
     *
     * @return Response
     */
    public function update(ItemGroup $item_group, Request $request)
    {
        $response = $this->ajaxDispatch(new UpdateItemGroup($item_group, $request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.item-groups.index');

            $message = trans('messages.success.updated', ['type' => $item_group->name]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.item-groups.edit', $item_group->id);

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Enable the specified resource.
     *
     * @param  ItemGroup $item
     *
     * @return Response
     */
    public function enable(ItemGroup $item_group)
    {
        $response = $this->ajaxDispatch(new UpdateItemGroup($item_group, request()->merge(['enabled' => 1])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.enabled', ['type' => $item_group->name]);
        }

        return response()->json($response);
    }

    /**
     * Disable the specified resource.
     *
     * @param  ItemGroup $item
     *
     * @return Response
     */
    public function disable(ItemGroup $item_group)
    {
        $response = $this->ajaxDispatch(new UpdateItemGroup($item_group, request()->merge(['enabled' => 0])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.disabled', ['type' => $item_group->name]);
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ItemGroup  $item_group
     *
     * @return Response
     */
    public function destroy(ItemGroup $item_group)
    {
        $response = $this->ajaxDispatch(new DeleteItemGroup($item_group));

        $response['redirect'] = route('inventory.item-groups.index');

        if ($response['success']) {
            $message = trans('messages.success.deleted', ['type' => $item_group->name]);

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Export the specified resource.
     *
     * @return Response
     */
    public function export()
    {
        return $this->exportExcel(new Export, trans_choice('inventory::general.item_groups', 2));
    }

    public function addVariant(VariantAddRequest $request)
    {
        $variant_row = $request->get('variant_row');

        $variants = Variant::enabled()->orderBy('name')->pluck('name', 'id');

        $html = view('inventory::item-groups.variant', compact('variant_row', 'variants'))->render();

        return response()->json([
            'success' => true,
            'error'   => false,
            'data'    => [],
            'message' => 'null',
            'html'    => $html,
        ]);
    }

    public function addItem(\Illuminate\Http\Request $request)
    {
        $name = $request->get('name');
        $variant_id = $request->get('variant_id');
        $_values = $request->get('values');
        $text_value = $request->get('text_value');

        $variant = Variant::with('values')->where('id', $variant_id)->first();

        $values = [];

        if ($_values) {
            foreach ($variant->values as $value) {
                if (in_array($value->id, $_values)) {
                    $values[] = [
                        'name' => !empty($name) ? $name . ' - ' . $value->name : $value->name,
                        'value' => $value->id
                    ];
                }
            }
        }

        if ($text_value) {
            $values[] = !empty($name) ? $name . ' - ' . $text_value : $text_value;
        }

        return response()->json([
            'data' => $values
        ]);
    }

    public function getVariantValues($variant_id)
    {
        $variant = Variant::with('values')->where('id', $variant_id)->first();
        $values = $variant->values()->get()->map(function ($item) {
            return [
                'label' => $item->name,
                'value' => $item->id
            ];
        });

        return response()->json([
            'variant' => $variant->id,
            'values' => $values,
        ]);
    }
}
