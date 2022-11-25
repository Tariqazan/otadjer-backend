{{ Form::multiSelectGroup(
    'warehouses', 
    trans_choice('inventory::general.warehouses', 2), 
    'warehouse', 
    $warehouses, 
    $selected_warehouse,
    ['v-model' => 'form.warehouses']) 
}}
