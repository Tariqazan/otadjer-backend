<?php

namespace Modules\Crm\Providers;

use Modules\Crm\Listeners\AddToAdminMenu;
use Modules\Crm\Listeners\GlobalSearched;
use Modules\Crm\Listeners\Update\Version200;
use Modules\Crm\Listeners\Update\Version201;
use Modules\Crm\Listeners\Update\Version220;
use Modules\Crm\Listeners\Update\Version227;
use Modules\Crm\Listeners\Update\Version2213;
use Modules\Crm\Listeners\Update\Version2218;
use Modules\Crm\Listeners\FinishInstallation;
use Modules\Crm\Listeners\ShowInSettingsPage;
use Modules\Crm\Listeners\CustomFieldsInstallation;
use Modules\Crm\Listeners\CustomFields\CustomFields;
use Modules\Crm\Listeners\CustomFields\Contacts\ContactSaved;
use Modules\Crm\Listeners\CustomFields\Companies\CompanySaved;
use Modules\Crm\Listeners\CustomFields\Contacts\ContactDeleted;
use Modules\Crm\Listeners\CustomFields\Companies\CompanyDeleted;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as Provider;

class Event extends Provider
{
    /**
     * The event listener mappings for the module.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\Common\GlobalSearched::class => [
            GlobalSearched::class,
        ],
        \App\Events\Menu\AdminCreated::class => [
            AddToAdminMenu::class,
        ],
        \App\Events\Module\Installed::class => [
            FinishInstallation::class,
            CustomFieldsInstallation::class,
        ],
        \App\Events\Module\SettingShowing::class => [
            ShowInSettingsPage::class,
        ],
        \App\Events\Install\UpdateFinished::class => [
            Version200::class,
            Version201::class,
            Version220::class,
            Version227::class,
            Version2213::class,
            Version2218::class,
        ],
        \Modules\CustomFields\Events\CustomFieldLocationSortColumns::class => [
            CustomFields::class,
        ],
        'eloquent.saved: Modules\Crm\Models\Contact' => [
            ContactSaved::class,
        ],
        'eloquent.deleted: Modules\Crm\Models\Contact' => [
            ContactDeleted::class,
        ],
        'eloquent.saved: Modules\Crm\Models\Company' => [
            CompanySaved::class,
        ],
        'eloquent.deleted: Modules\Crm\Models\Company' => [
            CompanyDeleted::class,
        ],
    ];
}
