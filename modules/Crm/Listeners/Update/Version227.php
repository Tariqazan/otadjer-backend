<?php

namespace Modules\Crm\Listeners\Update;

use App\Traits\Modules;
use Modules\Crm\Models\Deal;
use App\Events\Install\UpdateFinished;
use Illuminate\Support\Facades\Artisan;
use App\Abstracts\Listeners\Update as Listener;

class Version227 extends Listener
{
    use Modules;

    const ALIAS = 'crm';

    const VERSION = '2.2.7';

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

        Artisan::call('migrate', ['--force' => true]);

        $this->copyData();
    }

    protected function copyData()
    {
        $deals = Deal::all();

        foreach ($deals as $deal) {
            if (empty($deal->currency_code)) {
                $deal->currency_code = setting('default.currency');
                $deal->update();
            }
        }
    }
}
