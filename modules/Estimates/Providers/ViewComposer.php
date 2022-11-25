<?php

namespace Modules\Estimates\Providers;

use Illuminate\Support\ServiceProvider as Provider;
use Modules\Estimates\Http\ViewComposers\AddEstimatesStatistics;
use Modules\Estimates\Http\ViewComposers\AddExpiryDateField;
use Modules\Estimates\Http\ViewComposers\CustomFields;
use Modules\Estimates\Http\ViewComposers\EstimateType;
use Modules\Estimates\Http\ViewComposers\IndexExpiryDateField;
use Modules\Estimates\Http\ViewComposers\IndexExpiryDateFieldHeader;
use Modules\Estimates\Http\ViewComposers\ShowConvertToInvoice;
use Modules\Estimates\Http\ViewComposers\ShowConvertToSalesOrder;
use Modules\Estimates\Http\ViewComposers\ShowExpiryDateField;
use Modules\Estimates\Http\ViewComposers\ShowExpiryDateFieldHeader;
use Modules\Estimates\Http\ViewComposers\ShowMarkAsApprovedRefused;
use Modules\Estimates\Http\ViewComposers\ShowSentTimeline;
use View;

class ViewComposer extends Provider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['estimates::estimates.*', 'estimates::portal.estimates.*'], EstimateType::class);
        View::composer(['estimates::estimates.create', 'estimates::estimates.edit'], AddExpiryDateField::class);
        View::composer(['estimates::estimates.index'], IndexExpiryDateFieldHeader::class);
        View::composer(['partials.documents.index.card-table-row'], IndexExpiryDateField::class);
        View::composer(['sales.customers.show'], AddEstimatesStatistics::class);

        View::composer(
            [
                'estimates::estimates.show',
                'estimates::estimates.print_*',
                'estimates::portal.estimates.show',
                'estimates::portal.estimates.signed',
            ],
            ShowExpiryDateField::class,
        );

        View::composer(
            [
                'estimates::estimates.show',
                'estimates::portal.estimates.show',
                'estimates::portal.estimates.signed',
            ],
            ShowExpiryDateFieldHeader::class,
        );

        View::composer(['estimates::estimates.show'], ShowMarkAsApprovedRefused::class);
        View::composer(['estimates::estimates.show'], ShowConvertToInvoice::class);
        View::composer(['estimates::estimates.show'], ShowSentTimeline::class);

        if (null !== module('sales-purchase-orders')) {
            View::composer(['estimates::estimates.show'], ShowConvertToSalesOrder::class);
        }

        if (null !== module('custom-fields')) {
            View::composer(
                [
                    'estimates::estimates.create',
                    'estimates::estimates.edit',
                    'estimates::estimates.show',
                    'estimates::estimates.print*',
                    'estimates::portal.estimates.edit',
                    'estimates::portal.estimates.show',
                ],
                CustomFields::class
            );

            /*View::composer(
                [
                    'estimates::estimates.create',
                    'estimates::estimates.edit',
                    'estimates::estimates.show',
                    'estimates::estimates.print*',
                ],
                Modules::class
            );*/
//            View::composer('estimates::estimates.print*', PrintCustomFields::class);
//            View::composer('estimates::portal.estimates.*', PortalCustomFields::class);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
