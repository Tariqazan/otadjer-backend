<?php

namespace Modules\SalesPurchaseOrders\Http\ViewComposers;

use App\Utilities\Date;
use Illuminate\View\View;

class AddShipmentDateField
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
        $expected_shipment_date = Date::now()->addDays(setting('sales-purchase-orders.sales_order.shipment_terms'));

        if (isset($view->getData()['salesOrder'])) {
            $expected_shipment_date = $view->getData()['salesOrder']->extra_param->expected_shipment_date;
        }

        $view->getFactory()->startPush(
            'order_number_input_start',
            view('sales-purchase-orders::fields.add_expected_shipment_date', compact('expected_shipment_date'))
        );
    }

}
