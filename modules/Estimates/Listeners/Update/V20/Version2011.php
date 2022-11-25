<?php

namespace Modules\Estimates\Listeners\Update\V20;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished as Event;
use App\Models\Auth\Permission;
use App\Traits\Permissions;

class Version2011 extends Listener
{
    use Permissions;

    const ALIAS = 'estimates';

    const VERSION = '2.0.11';

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
        Permission::whereIn(
            'name',
            [
                'update-portal-estimates',
                'read-portal-estimates',
                'update-estimates-portal-estimates',
                'read-estimates-portal-estimates',
            ]
        )->each(
            function ($permission) {
                $permission->delete();
            }
        );

        $this->attachPermissionsToPortalRoles(['estimates-portal-estimates' => 'r,u']);
    }
}
