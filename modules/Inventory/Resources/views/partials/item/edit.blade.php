<div id="track_inventories" class="row col-md-12">
    @stack('track_inventory_input_start')
        <div id="item-track-inventory" class="form-group col-md-12 margin-top">
            <div class="custom-control custom-checkbox">
                {{ Form::checkbox('track_inventory', '1', $track_control, [
                    'v-model' => 'form.track_inventory',
                    'id' => 'track_inventory',
                    'class' => 'custom-control-input',
                ]) }}

                <label class="custom-control-label" for="track_inventory">
                    <strong>{{ trans('inventory::items.track_inventory')}}</strong>
                </label>
            </div>
        </div>

    <div v-if="form.track_inventory.length" class="row col-md-12">

    @stack('track_inventory_input_end')

        {{ Form::textGroup('opening_stock', trans('inventory::items.opening_stock'), 'cubes', [], !empty($inventory_item->opening_stock) ? $inventory_item->opening_stock : $item->quantity, 'col-md-6 item-inventory-form') }}

        {{ Form::textGroup('opening_stock_value', trans('inventory::items.opening_stock_value'), 'money', [], !empty($inventory_item->opening_stock_value) ? $inventory_item->opening_stock_value : $item->quantity, 'col-md-6 item-inventory-form') }}

        {{ Form::textGroup('reorder_level', trans('inventory::items.reorder_level'), 'repeat', [], !empty($inventory_item->reorder_level) ? $inventory_item->reorder_level : 0, 'col-md-6 item-inventory-form') }}

        {{ Form::selectGroup('vendor_id', trans_choice('general.vendors', 1), 'user', $vendors, !empty($inventory_item->vendor_id) ? $inventory_item->vendor_id : 0, [], 'col-md-6 d-none') }}

        @if ($warehouses->count() >= 2)
            {{ Form::selectGroup('warehouse_id', trans_choice('inventory::general.warehouses', 1), 'building', $warehouses, !empty($inventory_item->warehouse_id) ? $inventory_item->warehouse_id : setting('inventory.default_warehouse'), []) }}
        @endif
    </div>
</div>
