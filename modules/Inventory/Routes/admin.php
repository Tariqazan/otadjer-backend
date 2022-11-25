<?php

use Illuminate\Support\Facades\Route;

/**
 * 'admin' middleware and 'inventory' prefix applied to all routes (including names)
 *
 * @see \App\Providers\Route::register
 */


Route::admin('inventory', function () {
    // Items
    Route::get('items/mark-read-all', 'Items@markReadAll')->name('items.mark-read-all');
    Route::post('items/mark-read', 'Items@markRead')->name('items.mark-read');
    Route::post('items/import', 'Items@import')->name('items.import');
    Route::get('items/export', 'Items@export')->name('items.export');
    Route::get('items/{item}/print-barcode', 'Items@printBarcode')->name('items.print-barcode');
    Route::get('items/{item}/export-history', 'Items@exportHistory')->name('items.export-history');
    Route::get('items/{item}/enable', 'Items@enable')->name('items.enable');
    Route::get('items/{item}/disable', 'Items@disable')->name('items.disable');
    Route::resource('items', 'Items');

    //Item-groups
    Route::get('item-groups/autocomplete', 'ItemGroups@autocomplete')->name('item-groups.autocomplete');
    Route::get('item-groups/addItem', 'ItemGroups@addItem')->name('item-groups.add-item');
    Route::get('item-groups/addVariant', 'ItemGroups@addVariant')->name('item-groups.add-variant');
    Route::get('item-groups/getVariantValues/{variant_id}', 'ItemGroups@getVariantValues')->name('item-groups.get-variant-values');
    Route::get('item-groups/{item_group}/duplicate', 'ItemGroups@duplicate')->name('item-groups.duplicate');
    Route::post('item-groups/import', 'ItemGroups@import')->name('item-groups.import');
    Route::get('item-groups/export', 'ItemGroups@export')->name('item-groups.export');
    Route::get('item-groups/{item_group}/enable', 'ItemGroups@enable')->name('item-groups.enable');
    Route::get('item-groups/{item_group}/disable', 'ItemGroups@disable')->name('item-groups.disable');
    Route::resource('item-groups', 'ItemGroups', ['middleware' => ['money']]);

    // Variants
    Route::get('variants/{variant}/duplicate', 'Variants@duplicate')->name('variants.duplicate');
    Route::post('variants/import', 'Variants@import')->name('variants.import');
    Route::get('variants/export', 'Variants@export')->name('variants.export');
    Route::get('variants/{variant}/enable', 'Variants@enable')->name('variants.enable');
    Route::get('variants/{variant}/disable', 'Variants@disable')->name('variants.disable');
    Route::resource('variants', 'Variants');

    // Manufacturers
    Route::get('manufacturers/{manufacturer}/duplicate', 'Manufacturers@duplicate')->name('manufacturers.duplicate');
    Route::post('manufacturers/import', 'Manufacturers@import')->name('manufacturers.import');
    Route::get('manufacturers/export', 'Manufacturers@export')->name('manufacturers.export');
    Route::get('manufacturers/{manufacturer}/enable', 'Manufacturers@enable')->name('manufacturers.enable');
    Route::get('manufacturers/{manufacturer}/disable', 'Manufacturers@disable')->name('manufacturers.disable');
    Route::resource('manufacturers', 'Manufacturers');

    // Transfer Orders
    Route::get('getItemQuantity', 'TransferOrders@getItemQuantity')->name('transfer-orders.item-quantity');
    Route::get('getSourceItem', 'TransferOrders@getSourceItem')->name('transfer-orders.source-item');
    Route::get('getSource', 'TransferOrders@getSource')->name('transfer-orders.source');
    Route::get('transfer-orders/{transfer_order}/ready', 'TransferOrders@ready')->name('transfer-orders.ready');
    Route::get('transfer-orders/{transfer_order}/in_transfer', 'TransferOrders@inTransfer')->name('transfer-orders.in-transfer');
    Route::get('transfer-orders/{transfer_order}/transferred', 'TransferOrders@transferred')->name('transfer-orders.transferred');
    Route::get('transfer-orders/{transfer_order}/cancelled', 'TransferOrders@cancelled')->name('transfer-orders.cancelled');
    Route::get('transfer-orders/{transfer_order}/print', 'TransferOrders@printTransferOrder')->name('transfer-orders.print');
    Route::get('transfer-orders/{transfer_order}/download', 'TransferOrders@pdfTransferOrder')->name('transfer-orders.download');
    Route::resource('transfer-orders', 'TransferOrders');

    // Adjustments
    Route::get('getQuantity', 'Adjustments@getQuantity')->name('adjustments.item-quantity');
    Route::get('getItems', 'Adjustments@getItems')->name('adjustments.items');
    Route::get('adjustments/{adjustment}/print', 'Adjustments@printAdjustment')->name('adjustments.print');
    Route::get('adjustments/{adjustment}/download', 'Adjustments@pdfAdjustment')->name('adjustments.download');
    Route::resource('adjustments', 'Adjustments');

    // Warehouses
    Route::get('warehouses/{warehouse}/duplicate', 'Warehouses@duplicate')->name('warehouses.duplicate');
    Route::post('warehouses/import', 'Warehouses@import')->name('warehouses.import');
    Route::get('warehouses/export', 'Warehouses@export')->name('warehouses.export');
    Route::get('warehouses/{warehouse}/export-show', 'Warehouses@exportShow')->name('warehouses.export-show');
    Route::get('warehouses/{warehouse}/export-stock', 'Warehouses@exportStock')->name('warehouses.export-stock');
    Route::get('warehouses/{warehouse}/export-history', 'Warehouses@exportHistory')->name('warehouses.export-history');
    Route::get('warehouses/{warehouse}/enable', 'Warehouses@enable')->name('warehouses.enable');
    Route::get('warehouses/{warehouse}/disable', 'Warehouses@disable')->name('warehouses.disable');
    Route::resource('warehouses', 'Warehouses');

    //Histories
    Route::get('histories/print', 'Histories@print')->name('histories.print');
    Route::get('histories/export', 'Histories@export')->name('histories.export');
    Route::resource('histories', 'Histories');

    Route::get('invoice/item/autocomplete', 'Items@autocomplete')->name('invoice.item.autocomplete');
    Route::get('bill/item/autocomplete', 'Items@autocomplete')->name('bill.item.autocomplete');

    //Settings
    Route::get('settings', 'Settings@edit')->name('settings.edit');
    Route::post('settings', 'Settings@update')->name('settings.update');

    //Modals
    Route::patch('modals/barcode-templates', 'Modals\BarcodePrintTemplates@update')->name('modals.barcode-templates.update');

    //Serial No
    // Route::post('add-serial-no', 'Items@addSerialno')->name('add.serial_no');
    Route::post('add-serial-no', function(Request $request){
        $serial = new App\Models\Common\Serial();
        $serial->serial_no = $request->serial_no;
        $serial->item_id = App\Models\Common\Item::first()->id;
        $serial->save();
       return back();
    })->name('add.serial_no');
});

