{{ Form::selectGroup(
    'warehouse_id',
    trans_choice('inventory::general.warehouses', 1),
    'warehouse',
    $warehouses,
    null,
    $input_warehouse_attributes,
    'col-md-12 mb-0'
)}}
