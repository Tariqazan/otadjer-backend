<?php

namespace Modules\Inventory\Listeners;

use App\Abstracts\Listeners\Report as Listener;
use App\Events\Report\FilterApplying;
use App\Events\Report\FilterShowing;
use App\Models\Document\DocumentItem;
use App\Traits\Modules;
use Illuminate\Database\Eloquent\Builder;

class AddCustomersToSaleItem extends Listener
{
    use Modules;

    protected $classes = [
        'Modules\Inventory\Reports\SaleItem',
    ];

    /**
     * Handle filter showing event.
     *
     * @param  $event
     * @return void
     */
    public function handleFilterShowing(FilterShowing $event)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        if ($this->skipThisClass($event)) {
            return;
        }

        $event->class->filters['customers'] = $this->getCustomers(true);
        $event->class->filters['routes']['customers'] = 'customers.index';
    }

    /**
     * Handle filter showing event.
     *
     * @param  $event
     * @return void
     */
    public function handleFilterApplying(FilterApplying $event)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        if ($this->skipThisClass($event)) {
            return;
        }

        $contact_id = $this->getSearchStringValue('contact_id', '');

        if (empty($contact_id)) {
            return;
        }

        $event->model->whereHasMorph(
            'type',
            [DocumentItem::class],
            function (Builder $query) use ($contact_id) {
                $query->whereHas(
                    'document',
                    function (Builder $query) use ($contact_id) {
                        $query->where('contact_id', '=', $contact_id);
                    }
                );
            }
        );
    }
}