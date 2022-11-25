@stack('sku_input_start')
{{ Form::textGroup('sku', trans('inventory::general.sku'), 'fa fa-key', ['required' => 'required'], !empty($inventory_item->sku) ? $inventory_item->sku : '') }}
@stack('sku_input_end')