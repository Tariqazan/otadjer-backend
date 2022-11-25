<?php

use Illuminate\Support\Facades\Route;

/**
 * 'signed' middleware and 'signed/estimates' prefix applied to all routes (including names)
 *
 * @see \App\Providers\Route::register
 */

Route::signed(
    'estimates',
    function () {
        Route::get('{estimate}', 'Estimates@signed')->name('show');
        Route::get('{estimate}/print', 'Estimates@printEstimate')->name('print');
        Route::get('{estimate}/pdf', 'Estimates@pdfEstimate')->name('pdf');
        Route::get('{estimate}/approve', 'Estimates@markApproved')->name('approve');
        Route::get('{estimate}/refuse', 'Estimates@markRefused')->name('refuse');
    },
    [
        'as'        => 'signed.estimates.estimates.',
        'namespace' => 'Modules\Estimates\Http\Controllers\Portal',
    ]
);
