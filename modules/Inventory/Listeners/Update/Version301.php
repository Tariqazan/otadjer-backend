<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Models\Common\Company;
use App\Models\Document\Document;
use App\Traits\Documents;
use Illuminate\Support\Facades\Artisan;
use Modules\Inventory\Models\BillItem;
use Modules\Inventory\Models\DocumentItem;
use Modules\Inventory\Models\InvoiceItem;
use Modules\Inventory\Models\Item;

class Version301 extends Listener
{
    use Documents;

    const ALIAS = 'inventory';

    const VERSION = '3.0.1';

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
    }

    public function updateDatabase()
    {
        Artisan::call('module:migrate', ['alias' => self::ALIAS, '--force' => true]);
    }

    protected function copyData()
    {
        $invoice_items = InvoiceItem::all();

        foreach ($invoice_items as $invoice_item) {
            DocumentItem::create([
                'company_id'    => $invoice_item->company_id,
                'type'          => Document::INVOICE_TYPE,
                'document_id'   => $invoice_item->invoice_id,
                'item_id'       => $invoice_item->item_id,
                'warehouse_id'  => $invoice_item->warehouse_id,
                'quantity'      => $invoice_item->quantity,
            ]);
        }

        $bill_items = BillItem::all();

        foreach ($bill_items as $bill_item) {
            DocumentItem::create([
                'company_id'    => $bill_item->company_id,
                'type'          => Document::BILL_TYPE,
                'document_id'   => $bill_item->bill_id,
                'item_id'       => $bill_item->item_id,
                'warehouse_id'  => $bill_item->warehouse_id,
                'quantity'      => $bill_item->quantity,
            ]);
        }
    }
}
