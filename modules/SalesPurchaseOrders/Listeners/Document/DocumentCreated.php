<?php

namespace Modules\SalesPurchaseOrders\Listeners\Document;

use App\Events\Document\DocumentCreated as Event;
use App\Traits\Jobs;
use Modules\SalesPurchaseOrders\Jobs\CreatePurchaseOrderExtraParameter;
use Modules\SalesPurchaseOrders\Jobs\CreateSalesOrderExtraParameter;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as PurchaseOrder;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;

class DocumentCreated
{
    use Jobs;

    public function handle(Event $event): void
    {
        if (false === in_array($event->document->type, [SalesOrder::TYPE, PurchaseOrder::TYPE], true)) {
            return;
        }

        switch ($event->document->type) {
            case SalesOrder::TYPE:
                $class = CreateSalesOrderExtraParameter::class;

                if (false === $event->request->get('expected_shipment_date', false)) {
                    return;
                }

                break;
            case PurchaseOrder::TYPE:
                $class = CreatePurchaseOrderExtraParameter::class;

                if (false === $event->request->get('expected_delivery_date', false)) {
                    return;
                }

                break;
        }

        $this->dispatch(new $class($event->document, $event->request));
    }
}
