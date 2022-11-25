<?php

namespace Modules\SalesPurchaseOrders\Providers;

use Illuminate\Support\ServiceProvider as Provider;
use Modules\SalesPurchaseOrders\Http\ViewComposers\AddDeliveryDateField;
use Modules\SalesPurchaseOrders\Http\ViewComposers\AddShipmentDateField;
use Modules\SalesPurchaseOrders\Http\ViewComposers\PurchaseOrderType;
use Modules\SalesPurchaseOrders\Http\ViewComposers\SalesOrderType;
use Modules\SalesPurchaseOrders\Http\ViewComposers\ShowConvertToBill;
use Modules\SalesPurchaseOrders\Http\ViewComposers\ShowConvertToInvoice;
use Modules\SalesPurchaseOrders\Http\ViewComposers\ShowDeliveryDateField;
use Modules\SalesPurchaseOrders\Http\ViewComposers\ShowDeliveryDateFieldHeader;
use Modules\SalesPurchaseOrders\Http\ViewComposers\ShowMarkAsConfirmed;
use Modules\SalesPurchaseOrders\Http\ViewComposers\ShowMarkAsIssued;
use Modules\SalesPurchaseOrders\Http\ViewComposers\ShowSalesPurchaseOrdersButtons;
use Modules\SalesPurchaseOrders\Http\ViewComposers\ShowShipmentDateField;
use Modules\SalesPurchaseOrders\Http\ViewComposers\ShowShipmentDateFieldHeader;
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
        View::composer(
            ['sales-purchase-orders::sales_orders.*'],
            SalesOrderType::class
        );

        View::composer(
            ['sales-purchase-orders::purchase_orders.*'],
            PurchaseOrderType::class
        );

        View::composer(
            [
                'sales-purchase-orders::sales_orders.create',
                'sales-purchase-orders::sales_orders.edit',
            ],
            AddShipmentDateField::class
        );
        View::composer(
            [
                'sales-purchase-orders::purchase_orders.create',
                'sales-purchase-orders::purchase_orders.edit',
            ],
            AddDeliveryDateField::class
        );

        View::composer(
            [
                'sales-purchase-orders::sales_orders.show',
            ],
            ShowShipmentDateField::class,
        );

        View::composer(
            [
                'sales-purchase-orders::purchase_orders.show',
            ],
            ShowDeliveryDateField::class,
        );

        View::composer(
            [
                'sales-purchase-orders::sales_orders.show',
            ],
            ShowShipmentDateFieldHeader::class,
        );

        View::composer(
            [
                'sales-purchase-orders::purchase_orders.show',
            ],
            ShowDeliveryDateFieldHeader::class,
        );

        View::composer(
            [
                'sales-purchase-orders::sales_orders.show',
            ],
            ShowMarkAsConfirmed::class,
        );

        View::composer(
            [
                'sales-purchase-orders::purchase_orders.show',
            ],
            ShowMarkAsIssued::class,
        );

        View::composer(
            [
                'sales-purchase-orders::sales_orders.show',
            ],
            ShowConvertToInvoice::class,
        );

        View::composer(
            [
                'sales-purchase-orders::purchase_orders.show',
            ],
            ShowConvertToBill::class,
        );

        /*View::composer(
            [
                'partials.admin.navbar',
            ],
            ShowSalesPurchaseOrdersButtons::class,
        );*/
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
