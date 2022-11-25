<?php

namespace Modules\Estimates\Http\ViewComposers;

use App\Traits\Modules;
use Illuminate\View\View;

class ShowConvertToSalesOrder
{
    use Modules;

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        if (false === $this->moduleIsEnabled('sales-purchase-orders')) {
            return;
        }

        $document = $view->getData()['estimate'];

        if ('approved' !== $document->status) {
            return;
        }

        $view->getFactory()->startPush(
            'timeline_get_paid_start',
            view('estimates::fields.show_convert_to_sales_order', compact('document'))
        );
    }

}
