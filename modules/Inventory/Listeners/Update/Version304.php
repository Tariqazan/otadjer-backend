<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Models\Common\Widget;
use App\Events\Install\UpdateFinished;
use Illuminate\Support\Facades\Artisan;
use Modules\Inventory\Models\DocumentItem as InventoryDocumentItem;

class Version304 extends Listener
{
    const ALIAS = 'inventory';

    const VERSION = '3.0.4';

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

        $this->copyData();

        $this->widgetUpdate();
    }

    public function updateDatabase()
    {
        Artisan::call('module:migrate', ['alias' => self::ALIAS, '--force' => true]);
    }

    protected function copyData()
    {
        $inventory_document_items = InventoryDocumentItem::all();

        foreach ($inventory_document_items as $inventory_document_item) {
            $document_items = $inventory_document_item->document_items;

            foreach ($document_items as $document_item) {
                if ($document_item->item_id == $inventory_document_item->item_id) {
                    $inventory_document_item->document_item_id = $document_item->id;
                    $inventory_document_item->update();
                }
            }
        }
    }

    protected function widgetUpdate()
    {
        $widgets = Widget::where('class', 'Modules\Inventory\Widgets\TotalStockLineChart')
                         ->where('name', 'Total Stock Line Chart')
                         ->get();

        foreach ($widgets as $widget) {
            $widget->name = 'Tracked Items Cash Flow';
            $widget->update();
        }
    }
}
