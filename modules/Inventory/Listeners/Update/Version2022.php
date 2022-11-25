<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Models\Auth\Permission;
use App\Models\Auth\Role;
use App\Traits\Permissions;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class Version2022 extends Listener
{
    use Permissions;

    const ALIAS = 'inventory';

    const VERSION = '2.0.22';

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

        if ($p = Permission::where('name', 'read-inventory-transfer-orders')->pluck('id')->first()) {
            return;
        }

        $attach_permissions[] = Permission::firstOrCreate([
            'name' => 'create-inventory-transfer-orders',
            'display_name' => 'Create Inventory Transfer Orders',
            'description' => 'Create Inventory Transfer Orders',
        ]);

        $attach_permissions[] = Permission::firstOrCreate([
            'name' => 'read-inventory-transfer-orders',
            'display_name' => 'Read Inventory Transfer Orders',
            'description' => 'Read Inventory Transfer Orders',
        ]);

        $attach_permissions[] = Permission::firstOrCreate([
            'name' => 'update-inventory-transfer-orders',
            'display_name' => 'Update Inventory Transfer Orders',
            'description' => 'Update Inventory Transfer Orders',
        ]);

        $attach_permissions[] = Permission::firstOrCreate([
            'name' => 'delete-inventory-transfer-orders',
            'display_name' => 'Delete Inventory Transfer Orders',
            'description' => 'Delete Inventory Transfer Orders',
        ]);

        $roles = Role::all()->filter(function ($r) {
            return $r->hasPermission('read-inventory-item-groups');
        });

        foreach ($roles as $role) {
            foreach ($attach_permissions as $permission) {
                $this->attachPermission($role, $permission);
            }
        }
    }
}
