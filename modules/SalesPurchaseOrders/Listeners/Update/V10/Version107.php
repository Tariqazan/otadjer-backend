<?php

namespace Modules\SalesPurchaseOrders\Listeners\Update\V10;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished as Event;
use App\Traits\Permissions;

class Version107 extends Listener
{
    use Permissions;

    public const ALIAS = 'sales-purchase-orders';

    public const VERSION = '1.0.7';

    /**
     * Handle the event.
     *
     * @param  $event
     *
     * @return void
     */
    public function handle(Event $event): void
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        $this->updatePermissions();
    }


    protected function updatePermissions(): void
    {
        $this->attachPermissionsToAdminRoles(
            [
                'sales-purchase-orders-settings-sales-order' => 'r,u',
                'sales-purchase-orders-settings-purchase-order' => 'r,u',
            ]
        );
    }
}
