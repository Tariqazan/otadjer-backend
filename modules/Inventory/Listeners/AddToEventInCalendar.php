<?php

namespace Modules\Inventory\Listeners;

use App\Traits\Modules;
use Date;
use Modules\Calendar\Events\CalendarEventCreated as Event;
use Modules\Inventory\Models\Adjustment;
use Modules\Inventory\Models\TransferOrder;
use Modules\Inventory\Models\TransferOrderHistory;

class AddToEventInCalendar
{
    use Modules;

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(Event $event)
    {
        if (!$this->moduleIsEnabled('inventory') || !$this->moduleIsEnabled('calendar')) {
            return;
        }

        if (user()->canAny('read-inventory-adjustments')) {
            $adjustments = Adjustment::collect();

            foreach ($adjustments as $item) {
                $event->calendar->events[] = [
                    'title' => $item->adjustment_number,
                    'start' => Date::parse($item->date)->format('Y-m-d'),
                    'end' => Date::parse($item->date)->addDay(1)->format('Y-m-d'),
                    'type' => 'adjustment',
                    'id' => $item->id,
                    'backgroundColor' => '#8D021F',
                    'borderColor' => '#8D021F',
                    'extendedProps' => [
                        'show' => route('inventory.adjustments.show', $item->id),
                        'edit' => route('inventory.adjustments.edit', $item->id),
                        'description' => $item->description . trans('calendar::general.event_description', ['url' => route('inventory.adjustments.show', $item->id), 'name' => $item->adjustment_number]),
                        'date' => Date::parse($item->due_at)->format('Y-m-d')
                    ],
                ];
            }
        }

        if (user()->canAny('read-inventory-transfer-orders')) {
            $transfer_orders = TransferOrder::whereIn('status', ['ready', 'transferred', 'in_transfer'])->get();

            foreach ($transfer_orders as $item) {
                $status_and_date = TransferOrderHistory::where('transfer_order_id', $item->id)->get(['status', 'created_at'])->toArray();

                switch (end($status_and_date)['status']) {
                    case 'ready':
                        $color = '#ef3232';
                        $date = end($status_and_date)['created_at'];
                        break;
                    case 'in_transfer':
                        $color = '#efad32';
                        $date = end($status_and_date)['created_at'];
                        break;

                    default:
                        $color = '#6da252';
                        $date = end($status_and_date)['created_at'];
                        break;
                }

                $event->calendar->events[] = [
                    'title' => $item->transfer_order_number,
                    'start' => Date::parse($date)->format('Y-m-d'),
                    'end' => Date::parse($date)->addDay(1)->format('Y-m-d'),
                    'type' => 'transfer-order',
                    'id' => $item->id,
                    'backgroundColor' => $color,
                    'borderColor' => $color,
                    'extendedProps' => [
                        'show' => route('inventory.transfer-orders.show', $item->id),
                        'edit' => route('inventory.transfer-orders.edit', $item->id),
                        'description' => $item->description . trans('calendar::general.event_description', ['url' => route('inventory.transfer-orders.show', $item->id), 'name' => $item->transfer_order_number]),
                        'date' => Date::parse($date)->format('Y-m-d')
                    ],
                ];
            }
        }
    }
}