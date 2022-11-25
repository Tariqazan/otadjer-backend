<?php

namespace Modules\CustomFields\Traits;

use App\Traits\Modules;

trait Permissions
{
    use Modules;

    public function canCompose()
    {
        return app()->runningInConsole() || !env('APP_INSTALLED') || !$this->moduleIsEnabled('custom-fields');
    }
}
