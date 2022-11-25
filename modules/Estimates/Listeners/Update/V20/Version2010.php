<?php

namespace Modules\Estimates\Listeners\Update\V20;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished as Event;
use App\Traits\Permissions;
use Illuminate\Support\Facades\DB;

class Version2010 extends Listener
{
    use Permissions;

    const ALIAS = 'estimates';

    const VERSION = '2.0.10';

    /**
     * Handle the event.
     *
     * @param  $event
     *
     * @return void
     */
    public function handle(Event $event): void
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        $this->modifyPermissions();
    }

    protected function modifyPermissions(): void
    {
        DB::table('permissions')->whereIn('name', ['update-portal-estimates', 'read-portal-estimates'])->delete();

        $this->attachPermissionsToPortalRoles(['estimates-portal-estimates' => 'r,u']);
    }
}
