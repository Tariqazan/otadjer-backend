<?php

namespace Modules\SalesPurchaseOrders\BulkActions;

use App\Abstracts\BulkAction;
use App\Events\Document\DocumentCancelled;
use App\Events\Document\DocumentCreated;
use App\Events\Document\DocumentSent;
use App\Jobs\Document\DeleteDocument;
use Modules\SalesPurchaseOrders\Events\Confirmed;
use Modules\SalesPurchaseOrders\Exports\SalesPurchaseOrders as Export;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model;

class SalesOrders extends BulkAction
{
    public $model = Model::class;

    public $actions = [
        'sent'     => [
            'name'       => 'sales-purchase-orders::general.mark_sent',
            'message'    => 'sales-purchase-orders::bulk_actions.sales_order.sent',
            'permission' => 'update-sales-purchase-orders-sales-orders',
        ],
        'confirmed' => [
            'name'       => 'sales-purchase-orders::sales_orders.mark_confirmed',
            'message'    => 'sales-purchase-orders::bulk_actions.sales_order.confirmed',
            'permission' => 'update-sales-purchase-orders-sales-orders',
        ],
        'cancelled'  => [
            'name'       => 'general.cancel',
            'message'    => 'sales-purchase-orders::bulk_actions.sales_order.cancelled',
            'permission' => 'update-sales-purchase-orders-sales-orders',
        ],
        'delete'   => [
            'name'       => 'general.delete',
            'message'    => 'bulk_actions.message.delete',
            'permission' => 'delete-sales-purchase-orders-sales-orders',
        ],
        'export'   => [
            'name'    => 'general.export',
            'message' => 'bulk_actions.message.export',
        ],
    ];

    public function sent($request)
    {
        $salesOrders = $this->getSelectedRecords($request);

        foreach ($salesOrders as $salesOrder) {
            event(new DocumentSent($salesOrder));
        }
    }

    public function confirmed($request)
    {
        $salesOrders = $this->getSelectedRecords($request);

        foreach ($salesOrders as $salesOrder) {
            event(new Confirmed($salesOrder));
        }
    }

    public function cancelled($request)
    {
        $salesOrders = $this->getSelectedRecords($request);

        foreach ($salesOrders as $salesOrder) {
            event(new DocumentCancelled($salesOrder));
        }
    }

    public function duplicate($request)
    {
        $salesOrders = $this->getSelectedRecords($request);

        foreach ($salesOrders as $salesOrder) {
            $clone = $salesOrder->duplicate();

            event(new DocumentCreated($clone, $request));
        }
    }

    public function delete($request)
    {
        $this->destroy($request);
    }

    public function destroy($request)
    {
        $salesOrders = $this->getSelectedRecords($request);

        foreach ($salesOrders as $salesOrder) {
            try {
                $this->dispatch(new DeleteDocument($salesOrder));
            } catch (\Exception $e) {
                flash($e->getMessage())->error();
            }
        }
    }

    public function export($request)
    {
        $selected = $this->getSelectedInput($request);

        return \Excel::download(new Export($selected, Model::TYPE), \Str::filename(trans_choice('sales-purchase-orders::general.estimates', 2)) . '.xlsx');
    }
}
