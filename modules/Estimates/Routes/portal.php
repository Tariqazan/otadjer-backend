<?php

use Illuminate\Support\Facades\Route;

/**
 * 'portal' middleware and 'portal/estimates' prefix applied to all routes (including names)
 *
 * @see \App\Providers\Route::register
 */

Route::portal(
    'estimates',
    function () {
        Route::group(
            ['prefix' => 'estimates', 'as' => 'estimates.'],
            function () {
                Route::get('{estimate}/print', 'Estimates@printEstimate')->name('print');
                Route::get('{estimate}/pdf', 'Estimates@pdfEstimate')->name('pdf');

                Route::get('{estimate}/approve', 'Estimates@markApproved')->name('approve');
                Route::get('{estimate}/refuse', 'Estimates@markRefused')->name('refuse');
            }
        );

        Route::resource('estimates', 'Estimates');
    },
    ['namespace' => 'Modules\Estimates\Http\Controllers\Portal']
);
