<?php

namespace Modules\Inventory\Events;

use Illuminate\Queue\SerializesModels;

class AdjustmentCreated
{
    use SerializesModels;

    public $adjustment;

    /**
     * Create a new event instance.
     *
     * @param $adjustment
     */
    public function __construct($adjustment)
    {
        $this->adjustment = $adjustment;
    }
}
