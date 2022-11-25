<?php

namespace Modules\SalesPurchaseOrders\Http\ViewComposers;

use Illuminate\View\View;

class ShowMarkAsIssued
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
        $document = $view->getData()['purchaseOrder'];

        $view->getFactory()->startPush(
            'timeline_get_paid_start',
            view('sales-purchase-orders::fields.show_mark_as_issued', compact('document'))
        );
    }

}
