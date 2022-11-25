<?php

namespace Modules\SalesPurchaseOrders\Listeners\Document;

use App\Events\Document\DocumentCreated as Event;
use App\Jobs\Document\CreateDocumentHistory;
use App\Models\Document\Document;
use App\Traits\DateTime;
use App\Traits\Jobs;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as PurchaseOrder;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;
use Modules\SalesPurchaseOrders\Models\SalesPurchaseOrderDocument;

class CreateConvertedHistory
{
    use DateTime;
    use Jobs;

    /**
     * Handle the event.
     *
     * @param  $event
     *
     * @return void
     */
    public function handle(Event $event)
    {
        $query = parse_url(request()->server('HTTP_REFERER'), PHP_URL_QUERY);

        if (null === $query) {
            return;
        }

        list($key, $documentId) = explode('=', $query);

        if (false === $key || false === $documentId || 'document_id' !== $key) {
            return;
        }

        $document = Document::find($documentId);

        if (null === $document) {
            return;
        }

        if (false === in_array($document->type, [SalesOrder::TYPE, PurchaseOrder::TYPE], true)) {
            return;
        }

        $item_type          = PurchaseOrder::class;
        $convertDescription = trans(
            'sales-purchase-orders::general.converted_to_document',
            [
                'type'            => trans_choice('sales-purchase-orders::general.purchase_orders', 1),
                'document_number' => $event->document->document_number,
            ]
        );

        $createDescription = trans(
            'sales-purchase-orders::general.created_from_document',
            [
                'type'            => trans_choice('sales-purchase-orders::general.sales_orders', 1),
                'document_number' => $document->document_number,
            ]
        );

        if ($document->type === SalesOrder::TYPE && $event->document->type !== PurchaseOrder::TYPE) {
            $document->status = 'invoiced';
            $document->save();

            $item_type          = Document::class;
            $convertDescription = trans(
                'sales-purchase-orders::general.converted_to_document',
                [
                    'type'            => trans_choice('general.invoices', 1),
                    'document_number' => $event->document->document_number,
                ]
            );
        } elseif ($document->type === PurchaseOrder::TYPE) {
            $document->status = 'billed';
            $document->save();

            $item_type          = Document::class;
            $convertDescription = trans(
                'sales-purchase-orders::general.converted_to_document',
                [
                    'type'            => trans_choice('general.bills', 1),
                    'document_number' => $event->document->document_number,
                ]
            );

            $createDescription = trans(
                'sales-purchase-orders::general.created_from_document',
                [
                    'type'            => trans_choice('sales-purchase-orders::general.purchase_orders', 1),
                    'document_number' => $document->document_number,
                ]
            );
        }

        SalesPurchaseOrderDocument::create(
            [
                'company_id'  => company_id(),
                'document_id' => $document->id,
                'item_type'   => $item_type,
                'item_id'     => $event->document->id,
            ]
        );

        $this->dispatch(new CreateDocumentHistory($document, 0, $convertDescription));

        $this->dispatch(new CreateDocumentHistory($event->document, 0, $createDescription));
    }
}
