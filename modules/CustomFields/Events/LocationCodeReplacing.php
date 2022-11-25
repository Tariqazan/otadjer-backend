<?php

namespace Modules\CustomFields\Events;

class LocationCodeReplacing
{
    public $code;

    public $view;

    /**
     * Create a new event instance.
     *
     * @param $code
     * @param $view
     *
     */
    public function __construct($code, $view)
    {
        $this->code = $code;
        $this->view = $view;
    }
}
