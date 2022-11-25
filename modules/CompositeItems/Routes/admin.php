<?php

use Illuminate\Support\Facades\Route;

/**
 * 'admin' middleware and 'composite-items' prefix applied to all routes (including names)
 *
 * @see \App\Providers\Route::register
 */

Route::admin('composite-items', function () {
    Route::get('composite-items/{composite_item}/enable', 'CompositeItems@enable')->name('enable');
    Route::get('composite-items/{composite_item}/disable', 'CompositeItems@disable')->name('disable');
    Route::get('onSelectItem', 'CompositeItems@onSelectItem');
    Route::resource('composite-items', 'CompositeItems');
});
