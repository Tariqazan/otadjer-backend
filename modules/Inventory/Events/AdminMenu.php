<?php

namespace Modules\Inventory\Events;

use Illuminate\Queue\SerializesModels;

class AdminMenu
{
    use SerializesModels;

    public $menu;

    /**
     * Create a new menu instance.
     *
     * @param $menu
     */
    public function __construct($menu)
    {
        $this->menu = $menu;
    }
}
