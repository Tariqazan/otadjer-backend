<?php

namespace Modules\CompositeItems\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Interfaces\Listener\ShouldUpdateAllCompanies;
use Illuminate\Support\Facades\Artisan;
use App\Models\Common\Report;


class Version118 extends Listener implements ShouldUpdateAllCompanies
{
    const ALIAS = 'composite-items';

    const VERSION = '1.1.8';

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(UpdateFinished $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        Report::where('class', 'Modules\CompositeItems\Reports\SaleSummary')->delete();
    }
}
