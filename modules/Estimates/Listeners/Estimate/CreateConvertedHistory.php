<?php

namespace Modules\Estimates\Listeners\Estimate;

use App\Events\Document\DocumentCreated as Event;
use App\Jobs\Document\CreateDocumentHistory;
use App\Models\Document\Document;
use App\Traits\DateTime;
use App\Traits\Jobs;
use App\Traits\Modules;
use Modules\Estimates\Models\EstimateDocument;

class CreateConvertedHistory
{
    use DateTime;
    use Jobs;
    use Modules;

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

        list($key, $estimateId) = explode('=', $query);

        if (false === $key || false === $estimateId || 'document_id' !== $key) {
            return;
        }

        $document = Document::find($estimateId);

        if (null === $document) {
            return;
        }

        $salesPurchaseOrderIsEnabled = $this->moduleIsEnabled('sales-purchase-orders');

        if ($event->document->type !== Document::INVOICE_TYPE
            && (
                $salesPurchaseOrderIsEnabled
                && $event->document->type !== \Modules\SalesPurchaseOrders\Models\SalesOrder\Model::TYPE
            )
        ) {
            return;
        }

        if ($event->document->type === Document::INVOICE_TYPE) {
            $document->status = 'invoiced';
            $document->save();
        }

        EstimateDocument::create(
            [
                'company_id'  => company_id(),
                'document_id' => $document->id,
                'item_id'     => $event->document->id,
                'item_type'   => get_class($event->document),
            ]
        );

        if ($event->document->type === Document::INVOICE_TYPE) {
            $toDescription = trans(
                'estimates::general.converted_to_invoice',
                ['document_number' => $event->document->document_number]
            );
        } elseif ($salesPurchaseOrderIsEnabled
                  && $event->document->type === \Modules\SalesPurchaseOrders\Models\SalesOrder\Model::TYPE) {
            $toDescription = trans(
                'estimates::general.converted_to_sales_order',
                ['document_number' => $event->document->document_number]
            );
        }

        $this->dispatch(new CreateDocumentHistory($document, 0, $toDescription));

        $this->dispatch(
            new CreateDocumentHistory(
                $event->document,
                0,
                trans(
                    'estimates::general.created_from_estimate',
                    [
                        'document_number' => $document->document_number,
                        'type'            => setting('estimates.estimate.name', trans_choice('estimates::general.estimates', 1)),
                    ]
                )
            )
        );
    }
}
