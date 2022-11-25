<?php

namespace Modules\SalesPurchaseOrders\Listeners\Update\V10;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished as Event;
use App\Models\Common\EmailTemplate;
use App\Traits\Permissions;

class Version104 extends Listener
{
    use Permissions;

    const ALIAS = 'sales-purchase-orders';

    const VERSION = '1.0.4';

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

        $this->updateEmailTemplates();
    }

    protected function updateEmailTemplates()
    {
        $emailTemplate =
            EmailTemplate::where('name', 'sales-purchase-orders::settings.purchase_order.new_vendor')->first();

        if (null === $emailTemplate) {
            return;
        }

        if ('sales-purchase-orders::email_templates.purchase_order_new_vendor.subject' !== $emailTemplate->subject) {
            return;
        }

        $emailTemplate->subject = trans('sales-purchase-orders::email_templates.purchase_order_new_vendor.subject');
        $emailTemplate->body    = trans('sales-purchase-orders::email_templates.purchase_order_new_vendor.body');
        $emailTemplate->save();
    }
}
