<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Models\Common\Company;
use App\Traits\Permissions;
use Illuminate\Support\Facades\Artisan;
use Modules\Inventory\Models\Item;
use Modules\Inventory\Traits\Inventory;
use Modules\Inventory\Models\TransferOrder;
use Modules\Inventory\Models\TransferOrderItem;
use Modules\Inventory\Models\TransferOrderHistory;

class Version300 extends Listener
{
    use Permissions, Inventory;

    public $alias = 'inventory';

    const ALIAS = 'inventory';

    const VERSION = '3.0.0';

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

        $this->callSeeds();

        $this->updateDatabase();

        $this->copyData();

        $this->updatePermissions();
    }

    protected function callSeeds()
    {
        Artisan::call('company:seed', [
            'company' => company_id(),
            '--class' => 'Modules\Inventory\Database\Seeds\Dashboards',
        ]);
    }

    protected function copyData()
    {
        $inventory_items = Item::all();

        foreach ($inventory_items as $inventory_item) {
            $inventory_item->update([
                'unit' => 'units'
            ]);
        }

        $transfer_orders = TransferOrder::all();

        foreach ($transfer_orders as $transfer_order) {
            $transfer_order->update([
                'transfer_order_number' => $this->getNextTransferOrderNumber(),
                'status'                => 'transferred'
            ]);

            $inventory_item = Item::where('item_id', $transfer_order->item_id)
                                           ->where('warehouse_id', $transfer_order->source_warehouse_id)
                                           ->first();

            TransferOrderItem::create([
                'company_id'            => $transfer_order->company_id,
                'item_id'               => $transfer_order->item_id,
                'transfer_order_id'     => $transfer_order->id,
                'item_quantity'         => $inventory_item->opening_stock ?? 0,
                'transfer_quantity'     => $transfer_order->transfer_quantity,
            ]);

            $user = user();

            if (empty($user)) {
                $company = Company::find(company_id());
                $user = $company->users()->first();
            }

            TransferOrderHistory::create([
                'company_id'            => $transfer_order->company_id,
                'created_by'            => $user->id,
                'transfer_order_id'     => $transfer_order->id,
                'status'                => 'transferred',
            ]);
        }
    }

    public function updateDatabase()
    {
        Artisan::call('module:migrate', ['alias' => self::ALIAS, '--force' => true]);
    }

    protected function updatePermissions()
    {
        $this->attachPermissionsToAdminRoles([
            $this->alias . '-adjustments' => 'c,r,u,d',
            $this->alias . '-variants' => 'c,r,u,d',
        ]);
    }
}
