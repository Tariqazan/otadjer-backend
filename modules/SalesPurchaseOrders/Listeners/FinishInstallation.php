<?php

namespace Modules\SalesPurchaseOrders\Listeners;

use App\Events\Module\Installed as Event;
use Illuminate\Support\Facades\Artisan;
use Modules\SalesPurchaseOrders\Database\Seeds\Install;

class FinishInstallation
{
    public $alias = 'sales-purchase-orders';

    /**
     * Handle the event.
     *
     * @param Event $event
     *
     * @return void
     */
    public function handle(Event $event)
    {
        if ($event->alias !== $this->alias) {
            return;
        }

        $this->callSeeds();

//        Artisan::call('module:publish-config ' . $this->alias);
    }

    protected function callSeeds()
    {
        Artisan::call(
            'company:seed',
            [
                'company' => company_id(),
                '--class' => Install::class,
            ]
        );
    }
}
