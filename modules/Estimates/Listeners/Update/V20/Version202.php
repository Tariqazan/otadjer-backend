<?php

namespace Modules\Estimates\Listeners\Update\V20;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished as Event;
use App\Traits\Permissions;
use Illuminate\Support\Facades\DB;

class Version202 extends Listener
{
    use Permissions;

    const ALIAS = 'estimates';

    const VERSION = '2.0.2';

    protected $items;

    protected $categories;

    /**
     * Handle the event.
     *
     * @param  $event
     *
     * @return void
     */
    public function handle(Event $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        $this->items = [];

        $this->updateEstimateItems();
    }

    protected function updateEstimateItems()
    {
        $estimateItems = DB::table('estimate_items')->whereNull('deleted_at')->where('item_id', 0)->cursor();

        foreach ($estimateItems as $estimateItem) {
            $item_id = $this->getItemId($estimateItem);

            DB::table('estimate_items')
              ->where('id', $estimateItem->id)
              ->update(['item_id' => $item_id]);

            DB::table('items')
              ->where('id', $item_id)
              ->update(['sale_price' => $estimateItem->price]);
        }
    }

    protected function getItemId($item)
    {
        // Set category_id for company.
        if (!isset($this->categories[$item->company_id])) {
            $this->categories[$item->company_id] = DB::table('categories')
                                                     ->where('company_id', $item->company_id)
                                                     ->where('type', 'item')
                                                     ->first()->id;
        }

        // Return set item_id for item name.
        if (isset($this->items[$item->company_id]) && in_array($item->name, $this->items[$item->company_id])) {
            return array_search($item->name, $this->items[$item->company_id]);
        }

        // Insert new item.
        $item_id = DB::table('items')->insertGetId(
            [
                'company_id'     => $item->company_id,
                'name'           => $item->name,
                'description'    => null,
                'sale_price'     => $item->price,
                'purchase_price' => $item->price,
                'category_id'    => $this->categories[$item->company_id],
                'tax_id'         => null,
                'enabled'        => 1,
                'created_at'     => $item->created_at,
                'updated_at'     => $item->updated_at,
                'deleted_at'     => null,
            ]
        );

        // Set item_id for item name.
        $this->items[$item->company_id][$item_id] = $item->name;

        return $item_id;
    }
}
