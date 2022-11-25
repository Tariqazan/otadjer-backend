<?php

namespace Modules\SalesPurchaseOrders\Http\ViewComposers;

use Illuminate\View\View;

class ShowSalesPurchaseOrdersButtons
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->getFactory()
             ->startPush(
                 'navbar_create_invoice',
                 view('sales-purchase-orders::partials.navbar_sales_order_button')
             );

        $view->getFactory()
             ->startPush(
                 'navbar_create_bill',
                 view('sales-purchase-orders::partials.navbar_purchase_order_button')
             );
    }
}
