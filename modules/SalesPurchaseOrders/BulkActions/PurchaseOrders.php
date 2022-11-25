<?php

namespace Modules\SalesPurchaseOrders\BulkActions;

use App\Abstracts\BulkAction;
use App\Events\Document\DocumentCancelled;
use App\Events\Document\DocumentCreated;
use App\Events\Document\DocumentSent;
use App\Jobs\Document\DeleteDocument;
use Modules\SalesPurchaseOrders\Events\Issued;
use Modules\SalesPurchaseOrders\Exports\SalesPurchaseOrders as Export;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model;

class PurchaseOrders extends BulkAction
{
    public $model = Model::class;

    public $actions = [
        'sent'      => [
            'name'       => 'sales-purchase-orders::general.mark_sent',
            'message'    => 'sales-purchase-orders::bulk_actions.purchase_order.sent',
            'permission' => 'update-sales-purchase-orders-purchase-orders',
        ],
        'issued'    => [
            'name'       => 'sales-purchase-orders::purchase_orders.mark_issued',
            'message'    => 'sales-purchase-orders::bulk_actions.purchase_order.issued',
            'permission' => 'update-sales-purchase-orders-purchase-orders',
        ],
        'cancelled' => [
            'name'       => 'general.cancel',
            'message'    => 'sales-purchase-orders::bulk_actions.purchase_order.cancelled',
            'permission' => 'update-sales-purchase-orders-purchase-orders',
        ],
        'delete'    => [
            'name'       => 'general.delete',
            'message'    => 'bulk_actions.message.delete',
            'permission' => 'delete-sales-purchase-orders-purchase-orders',
        ],
        'export'    => [
            'name'    => 'general.export',
            'message' => 'bulk_actions.message.export',
        ],
    ];

    public function sent($request)
    {
        $purchaseOrders = $this->getSelectedRecords($request);

        foreach ($purchaseOrders as $purchaseOrder) {
            event(new DocumentSent($purchaseOrder));
        }
    }

    public function issued($request)
    {
        $purchaseOrders = $this->getSelectedRecords($request);

        foreach ($purchaseOrders as $purchaseOrder) {
            event(new Issued($purchaseOrder));
        }
    }

    public function cancelled($request)
    {
        $purchaseOrders = $this->getSelectedRecords($request);

        foreach ($purchaseOrders as $purchaseOrder) {
            event(new DocumentCancelled($purchaseOrder));
        }
    }

    public function duplicate($request)
    {
        $purchaseOrders = $this->getSelectedRecords($request);

        foreach ($purchaseOrders as $purchaseOrder) {
            $clone = $purchaseOrder->duplicate();

            event(new DocumentCreated($clone, $request));
        }
    }

    public function delete($request)
    {
        $this->destroy($request);
    }

    public function destroy($request)
    {
        $purchaseOrders = $this->getSelectedRecords($request);

        foreach ($purchaseOrders as $purchaseOrder) {
            try {
                $this->dispatch(new DeleteDocument($purchaseOrder));
            } catch (\Exception $e) {
                flash($e->getMessage())->error();
            }
        }
    }

    public function export($request)
    {
        $selected = $this->getSelectedInput($request);

        return \Excel::download(
            new Export($selected, Model::TYPE),
            \Str::filename(trans_choice('sales-purchase-orders::general.estimates', 2)) . '.xlsx'
        );
    }
}
