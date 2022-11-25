<?php

namespace Modules\Crm\Listeners\CustomFields;

use App\Traits\Modules;
use Modules\CustomFields\Events\CustomFieldLocationSortColumns as Event;
use Modules\Inventory\Models\History as InventoryHistory;
use Modules\Inventory\Models\InvoiceItem as InventoryInvoiceItem;
use Modules\Inventory\Models\BillItem as InventoryBillItem;
use Modules\Inventory\Models\Item as InventoryItem;

class CustomFields
{
    use Modules;

    /**
     * Handle the event.
     *
     * @param  Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        if (!$this->moduleIsEnabled('crm') || !$this->moduleIsEnabled('custom-fields')) {
            return;
        }

        if ($event->code == 'crm.contacts') {
            $sorts = $this->contacts();
        } elseif ($event->code == 'crm.companies') {
            $sorts = $this->companies();
        }

        return $sorts;
    }

    public function contacts()
    {
        return [
            'name'          => trans('general.name'),
            'email'         => trans('general.email'),
            'contact_type'  => trans_choice('crm::general.companies', 1),
            'phone'         => trans('general.phone'),
            'stage'         => trans('crm::general.stage.title'),
            'owner_id'      => trans('crm::general.owner'),
            'born_at'       => trans('crm::general.born_date'),
            'mobile'        => trans('crm::general.mobile'),
            'website'       => trans('general.website'),
            'fax_number'    => trans('crm::general.fax_number'),
            'source'        => trans('crm::general.source'),
            'address'       => trans('general.address'),
            'note'          => trans_choice('general.notes', 1),
            'picture'       => trans_choice('general.pictures', 1),
            'enabled'       => trans('general.enabled'),
        ];
    }

    public function companies()
    {
        return [
            'name'          => trans('general.name'),
            'email'         => trans('general.email'),
            'contact_type'  => trans_choice('crm::general.contacts', 1),
            'phone'         => trans('general.phone'),
            'stage'         => trans('crm::general.stage.title'),
            'owner_id'      => trans('crm::general.owner'),
            'born_at'       => trans('crm::general.born_date'),
            'mobile'        => trans('crm::general.mobile'),
            'website'       => trans('general.website'),
            'fax_number'    => trans('crm::general.fax_number'),
            'source'        => trans('crm::general.source'),
            'address'       => trans('general.address'),
            'note'          => trans_choice('general.notes', 1),
            'picture'       => trans_choice('general.pictures', 1),
            'enabled'       => trans('general.enabled'),
        ];
    }
}
