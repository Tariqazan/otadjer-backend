<?php

namespace Modules\Estimates\Events;

use Illuminate\Queue\SerializesModels;

class Deleted
{
    use SerializesModels;

    public $estimate;

    /**
     * Create a new event instance.
     *
     * @param $estimate
     */
    public function __construct($estimate)
    {
        $this->estimate = $estimate;
    }
}
