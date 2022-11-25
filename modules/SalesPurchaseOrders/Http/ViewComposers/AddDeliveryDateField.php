<?php

namespace Modules\SalesPurchaseOrders\Http\ViewComposers;

use App\Utilities\Date;
use Illuminate\View\View;

class AddDeliveryDateField
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
        $expected_delivery_date = Date::now()->addDays(setting('sales-purchase-orders.purchase_order.delivery_terms'));

        if (isset($view->getData()['purchaseOrder'])) {
            $expected_delivery_date = $view->getData()['purchaseOrder']->extra_param->expected_delivery_date;
        }

        $view->getFactory()->startPush(
            'order_number_input_start',
            view('sales-purchase-orders::fields.add_expected_delivery_date', compact('expected_delivery_date'))
        );
    }

}
