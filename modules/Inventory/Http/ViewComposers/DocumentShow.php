<?php

namespace Modules\Inventory\Http\ViewComposers;

use App\Traits\Modules;
use Illuminate\View\View;
use Modules\Inventory\Models\Item as InventoryItem;

class DocumentShow
{
    use Modules;

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        $request = request();

        if ($request->routeIs('invoices.show') || $request->routeIs('bills.show')) {
            $unit = InventoryItem::where('item_id', $view->getData()['item']->item_id)->value('unit');

            if (!empty($unit)) {
                $view->getFactory()->startPush('item_custom_fields_' . $view->getData()['item']->id, view('inventory::partials.document_show', compact('unit')));
            }
        }
    }
}
