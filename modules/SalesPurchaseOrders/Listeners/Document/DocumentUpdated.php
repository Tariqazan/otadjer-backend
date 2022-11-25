<?php

namespace Modules\SalesPurchaseOrders\Listeners\Document;

use App\Events\Document\DocumentUpdated as Event;
use App\Traits\Jobs;
use Modules\SalesPurchaseOrders\Jobs\UpdatePurchaseOrderExtraParameter;
use Modules\SalesPurchaseOrders\Jobs\UpdateSalesOrderExtraParameter;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as PurchaseOrder;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;

class DocumentUpdated
{
    use Jobs;

    public function handle(Event $event): void
    {
        if (false === in_array($event->document->type, [SalesOrder::TYPE, PurchaseOrder::TYPE], true)) {
            return;
        }

        switch ($event->document->type) {
            case SalesOrder::TYPE:
                $class = UpdateSalesOrderExtraParameter::class;
                break;
            case PurchaseOrder::TYPE:
                $class = UpdatePurchaseOrderExtraParameter::class;
                break;
        }

        $this->dispatch(new $class($event->document, $event->request));
    }
}
