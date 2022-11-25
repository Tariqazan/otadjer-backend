<?php

namespace Modules\SalesPurchaseOrders\Http\ViewComposers;

use Illuminate\View\View;

class ShowConvertToInvoice
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
        $document = $view->getData()['salesOrder'];

        $view->getFactory()->startPush(
            'timeline_get_paid_end',
            view('sales-purchase-orders::fields.show_convert_to_invoice', compact('document'))
        );
    }

}
