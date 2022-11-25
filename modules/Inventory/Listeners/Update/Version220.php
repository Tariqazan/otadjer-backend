<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Traits\Modules;
use Modules\Inventory\Models\ItemGroupItem;
use Modules\Inventory\Models\ItemGroupOptionValue;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class Version220 extends Listener
{
    use Modules;

    const ALIAS = 'inventory';

    const VERSION = '2.2.0';

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(UpdateFinished $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        $this->updateDatabase();
        $this->copyItems();
    }

    public function updateDatabase()
    {
        Artisan::call('module:migrate', ['alias' => self::ALIAS, '--force' => true]);
    }

    protected function copyItems()
    {
        $option_items = DB::table('inventory_item_group_option_items')
                          ->where('company_id', company_id())
                          ->cursor();

        foreach ($option_items as $option_item) {
            $group_item = ItemGroupItem::create([
                'company_id'            => $option_item->company_id,
                'item_id'               => $option_item->item_id,
                'item_group_id'         => $option_item->item_group_id,
            ]);

            ItemGroupOptionValue::where('item_group_option_id', $option_item->item_group_option_id)
                ->update([
                    'item_group_item_id' => $group_item->id
                ]);

            if ($this->moduleExists('woocommerce')) {
                \Modules\Woocommerce\Models\WooCommerceIntegration::withTrashed()
                                                                  ->where('item_type', 'Modules\Inventory\Models\ItemGroupOptionItem')
                                                                  ->where('item_id', $option_item->id)
                                                                  ->update(['item_id' => $group_item->id]);
            }
        }

        if ($this->moduleExists('woocommerce')) {
            \Modules\Woocommerce\Models\WooCommerceIntegration::withTrashed()
                                                              ->where('item_type', 'Modules\Inventory\Models\ItemGroupOptionItem')
                                                              ->update(['item_type' => ItemGroupItem::class]);
        }
    }
}
