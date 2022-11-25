<?php

namespace Modules\SalesPurchaseOrders\Http\ViewComposers;

use Illuminate\View\View;

class ShowDeliveryDateField
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
        $expected_delivery_date = $view->getData()['purchaseOrder']->extra_param->expected_delivery_date;

        $view->getFactory()->startPush(
            'issued_at_input_end',
            view('sales-purchase-orders::fields.show_expected_delivery_date', compact('expected_delivery_date'))
        );
    }

}
