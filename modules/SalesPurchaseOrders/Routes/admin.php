<?php

use Illuminate\Support\Facades\Route;

/**
 * 'admin' middleware and 'sales-purchase-orders' prefix applied to all routes (including names)
 *
 * @see \App\Providers\Route::register
 */


Route::admin(
    'sales-purchase-orders',
    function () {
        Route::group(
            [
                'as'     => 'settings.',
                'prefix' => 'settings',
                'namespace'  => 'Settings',

            ],
            function () {
                Route::group(
                    [
                        'as'     => 'sales-order.',
                        'prefix' => 'sales-order',
                    ],
                    function () {
                        Route::get('/', 'SalesOrder@edit')->name('edit');
                        Route::patch('/', 'SalesOrder@update')->name('update');
                    }
                );
                Route::group(
                    [
                        'as'     => 'purchase-order.',
                        'prefix' => 'purchase-order',
                    ],
                    function () {
                        Route::get('/', 'PurchaseOrder@edit')->name('edit');
                        Route::patch('/', 'PurchaseOrder@update')->name('update');
                    }
                );
            }
        );

        Route::group(
            [
                'as'     => 'modals.',
                'prefix' => 'modals',
                'namespace'  => 'Modals',
            ],
            function () {
                Route::patch('sales-order-templates', 'SalesOrderTemplate@update')->name('sales-order-template.update');
                Route::patch('purchase-order-templates', 'PurchaseOrderTemplate@update')->name('purchase-order-template.update');
            }
        );
    }
);

Route::admin(
    'sales-purchase-orders',
    function () {
        Route::group(
            ['prefix' => 'sales-orders'],
            function () {
                Route::group(
                    ['as' => 'sales-orders.'],
                    function () {
                        Route::get('{sales_order}/send', 'SalesOrders@markSent')->name('sent');
                        Route::get('{sales_order}/confirm', 'SalesOrders@markConfirmed')->name('confirmed');
                        Route::get('{sales_order}/cancel', 'SalesOrders@markCancelled')->name('cancelled');
                        Route::get('{sales_order}/email', 'SalesOrders@emailSalesOrder')->name('email');
                        Route::get('{sales_order}/convert-to-invoice', 'SalesOrders@convertToInvoice')->name('convert-to-invoice');
                        Route::get('{sales_order}/convert-to-purchase-order', 'SalesOrders@convertToPurchaseOrder')->name('convert-to-purchase-order');
                        Route::get('{sales_order}/print', 'SalesOrders@printSalesOrder')->name('print');
                        Route::get('{sales_order}/pdf', 'SalesOrders@pdfSalesOrder')->name('pdf');
                        Route::get('{sales_order}/duplicate', 'SalesOrders@duplicate')->name('duplicate');

                        Route::post('import', 'SalesOrders@import')->name('import');
                        Route::get('export', 'SalesOrders@export')->name('export');
                    }
                );
            }
        );

        Route::group(
            ['prefix' => 'purchase-orders'],
            function () {
                Route::group(
                    ['as' => 'purchase-orders.'],
                    function () {
                        Route::get('{purchase_order}/send', 'PurchaseOrders@markSent')->name('sent');
                        Route::get('{purchase_order}/issue', 'PurchaseOrders@markIssued')->name('issued');
                        Route::get('{purchase_order}/cancel', 'PurchaseOrders@markCancelled')->name('cancelled');
                        Route::get('{purchase_order}/email', 'PurchaseOrders@emailPurchaseOrder')->name('email');
                        Route::get('{purchase_order}/convert-to-bill', 'PurchaseOrders@convertToBill')->name('convert-to-bill');
                        Route::get('{purchase_order}/print', 'PurchaseOrders@printPurchaseOrder')->name('print');
                        Route::get('{purchase_order}/pdf', 'PurchaseOrders@pdfPurchaseOrder')->name('pdf');
                        Route::get('{purchase_order}/duplicate', 'PurchaseOrders@duplicate')->name('duplicate');

                        Route::post('import', 'PurchaseOrders@import')->name('import');
                        Route::get('export', 'PurchaseOrders@export')->name('export');
                    }
                );
            }
        );

        Route::resource('sales-orders', 'SalesOrders', ['middleware' => ['date.format', 'money']]);
        Route::resource('purchase-orders', 'PurchaseOrders', ['middleware' => ['date.format', 'money']]);
    },
    ['prefix' => 'sales']
);
