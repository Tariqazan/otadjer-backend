{{ Form::selectGroup('warehouse_id', trans_choice('inventory::general.warehouses', 1), 'warehouse', $warehouses, setting('inventory.default_warehouse'),
    [
        'data-item' => 'warehouse_id',
        'v-model' => 'row.warehouse_id',
        'visible-change' => 'onBindingItemField(index, "warehouse_id")'
    ],
    'col-md-12 mb-2'
)}}

{{ Form::selectGroup('unit', trans('inventory::general.unit'), 'fas fa-box-open', $units, setting('inventory.default_unit'),
    [
        'data-item' => 'unit',
        'v-model' => 'row.unit',
        'visible-change' => 'onBindingItemField(index, "unit")'
    ],
    'col-md-12 mb-2'
)}}

<div class="custom-control custom-checkbox pl-5">
    {{ Form::checkbox('track_inventory', '1', setting('inventory.track_inventory'), [
        'v-model' => 'row.track_inventory',
        'id' => 'track_inventory',
        'class' => 'custom-control-input'
    ]) }}

    <label class="custom-control-label" for="track_inventory">
        <strong>{{ trans('inventory::items.track_inventory')}}</strong>
    </label>
</div>
