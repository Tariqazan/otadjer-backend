<?php

namespace Modules\SalesPurchaseOrders\Http\ViewComposers;

use Illuminate\View\View;

class ShowShipmentDateFieldHeader
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
        $expected_shipment_date = $view->getData()['salesOrder']->extra_param->expected_shipment_date;

        $view->getFactory()->startPush(
            'header_due_at_start',
            view('sales-purchase-orders::fields.show_expected_shipment_date_header', compact('expected_shipment_date'))
        );
    }

}
