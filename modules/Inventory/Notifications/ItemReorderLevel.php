<?php

namespace Modules\Inventory\Notifications;

use App\Abstracts\Notification;
use Illuminate\Support\Facades\URL;
use Modules\Inventory\Models\Item as Model;

class ItemReorderLevel extends Notification
{
    /**
     * The item model.
     *
     * @var Model
     */
    public $item;

    public function __construct(Model $item = null)
    {
        parent::__construct();

        $this->item = $item;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'inventory_item_id' => $this->item->id,
            'opening_stock'     => $this->item->opening_stock,
            'reorder_level'     => $this->item->reorder_level,
        ];
    }
}
