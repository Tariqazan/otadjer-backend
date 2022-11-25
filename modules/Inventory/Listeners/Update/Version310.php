<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Models\Common\Item;
use App\Models\Document\DocumentItem;
use App\Interfaces\Listener\ShouldUpdateAllCompanies;
use App\Traits\Jobs;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Modules\Inventory\Models\DocumentItem as InventoryDocumentItem;
use Modules\Inventory\Models\Item as InventoryItem;
use Modules\Inventory\Models\History;
use Modules\Inventory\Jobs\Histories\CreateHistory;
use Modules\Inventory\Jobs\Items\CreateInventoryDocumentItem;

class Version310 extends Listener implements ShouldUpdateAllCompanies
{
    use Jobs;

    const ALIAS = 'inventory';

    const VERSION = '3.1.0';

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

        // added barcode fields
        Artisan::call('module:migrate', ['alias' => self::ALIAS, '--force' => true]);

        setting()->set('inventory.barcode_type', 0);
        setting()->save();

        // document status send and partial duplicate issue
        $this->duplicateTransactions();

        // error when using the same item on the invoice/bill more than once
        $this->updateDatabase();
    }

    protected function duplicateTransactions()
    {
        // deleted history lines affect stock. so we also fix the deleted ones
        $histories = History::withTrashed()
                            ->select('item_id', 'type_id', 'warehouse_id', History::raw('count(*) as total'))
                            ->where('type_type', 'App\Models\Document\DocumentItem')
                            ->groupBy('type_id')
                            ->get();

        foreach ($histories as $history) {
            if ($history->total < 2) {
                continue;
            }

            $document_item = DocumentItem::withTrashed()->find($history->type_id);

            if (!$document_item) {
                continue;
            }

            $inventory_item = InventoryItem::withTrashed()
                                           ->where('item_id', $history->item_id)
                                           ->where('warehouse_id', $history->warehouse_id)
                                           ->first();

            if (!$inventory_item) {
                continue;
            }

            $quantity = $document_item->quantity * ($history->total - 1);

            switch ($document_item->type) {
                case 'invoice':
                    $inventory_item->opening_stock += (float) $quantity;

                    break;
                case 'bill':
                    $inventory_item->opening_stock -= (float) $quantity;

                    break;
            }

            $inventory_item->update();
        }
    }

    protected function updateDatabase()
    {
        $inv_doc_items = InventoryDocumentItem::all();
        
        //finds and adds rows in the document_item table that are not in the inventory_document_item table
        foreach ($inv_doc_items as $inv_doc_item) {
            if (empty($inv_doc_item->item->inventory)) {
                continue;
            }
            
            try {
                $inventory_item = $inv_doc_item->item->inventory()->where('warehouse_id', $inv_doc_item->warehouse_id)->first();
            } catch (\Exception $e) {
                continue;
            }
            
            $inventory_item = $inv_doc_item->item->inventory()->where('warehouse_id', $inv_doc_item->warehouse_id)->first();

            if (!$inventory_item || $inv_doc_item->multi_document_item->count() <= 1) {
                continue;
            }

            // returns duplicate items in the document_item table
            foreach ($inv_doc_item->multi_document_item as $doc_item) {
                if ($doc_item->document->status == 'draft' || 
                    $doc_item->document->status == 'canceled' || 
                    $inv_doc_item->document_item_id == $doc_item->id) {
                    continue;
                }

                $history = History::where('type_type', 'App\Models\Document\DocumentItem')
                                  ->where('type_id', $doc_item->id)
                                  ->where('quantity', $doc_item->quantity)
                                  ->first();

                if (!empty($history)) {
                    continue;
                }

                $data = [
                    'company_id'        => $doc_item->company_id,
                    'type'              => $doc_item->type,
                    'document_id'       => $doc_item->document_id,
                    'document_item_id'  => $doc_item->id,
                    'item_id'           => $doc_item->item_id,
                    'warehouse_id'      => $inv_doc_item->warehouse_id,
                    'quantity'          => $doc_item->quantity,
                    'created_at'        => $doc_item->created_at,
                    'updated_at'        => $doc_item->updated_at,
                ];

                $this->ajaxDispatch(new CreateInventoryDocumentItem($data));

                // performs inventory operation of the lines added to the inventory_document_item table
                $this->updateInvItem($inventory_item, $doc_item, $inv_doc_item);
            }
        }
    }

    protected function updateInvItem($inventory_item, $doc_item, $inv_doc_item)
    {
        switch ($doc_item->document->type) {
            case 'invoice':
                $inventory_item->opening_stock -= (float) $doc_item->quantity;

                break;
            case 'bill':
                $inventory_item->opening_stock += (float) $doc_item->quantity;

                break;
        }

        $inventory_item->update([
            'opening_stock' => $inventory_item->opening_stock,
        ]);

        $history_data = [
            'company_id'    => $doc_item->company_id,
            'user_id'       => $doc_item->created_by,
            'item_id'       => $doc_item->item->id,
            'type_id'       => $doc_item->id,
            'type_type'     => get_class($doc_item),
            'warehouse_id'  => $inv_doc_item->warehouse_id,
            'quantity'      => $doc_item->quantity,
            'created_at'    => $doc_item->created_at,
            'updated_at'    => $doc_item->updated_at,
        ];

        $this->ajaxDispatch(new CreateHistory($history_data));
    }
}
