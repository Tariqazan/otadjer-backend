<?php

namespace Modules\Estimates\Providers;

use App\Models\Common\Company;
use Illuminate\Support\ServiceProvider as Provider;
use Modules\Estimates\Models\Estimate;
use Modules\Estimates\Observers\Company as CompanyObserver;
use Modules\Estimates\Observers\Document;

class Observer extends Provider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        Company::observe(CompanyObserver::class);
        Estimate::observe(Document::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
