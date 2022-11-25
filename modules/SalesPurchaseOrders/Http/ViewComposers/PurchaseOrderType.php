<?php

namespace Modules\SalesPurchaseOrders\Http\ViewComposers;

use Illuminate\View\View;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model;

class PurchaseOrderType
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
        $view->with(['type' => Model::TYPE]);
    }
}
