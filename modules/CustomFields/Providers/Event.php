<?php

namespace Modules\CustomFields\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class Event extends ServiceProvider
{
    /**
     * The event listener mappings for the module.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\Module\Installed::class => [
            \Modules\CustomFields\Listeners\FinishInstallation::class,
        ],
        \App\Events\Module\SettingShowing::class => [
            \Modules\CustomFields\Listeners\ShowInSettingsPage::class,
        ],
        \App\Events\Install\UpdateFinished::class => [
            \Modules\CustomFields\Listeners\Update\Version200::class,
            \Modules\CustomFields\Listeners\Update\Version210::class,
            \Modules\CustomFields\Listeners\Update\Version213::class,
            \Modules\CustomFields\Listeners\Update\Version214::class,
            \Modules\CustomFields\Listeners\Update\Version215::class,
            \Modules\CustomFields\Listeners\Update\Version2110::class,
            \Modules\CustomFields\Listeners\Update\Version2112::class,
            \Modules\CustomFields\Listeners\Update\Version2113::class,
        ],
        \App\Events\Export\HeadingsPreparing::class => [
            \Modules\CustomFields\Listeners\Export\AppendHeadings::class,
        ],
        \App\Events\Export\RowsPreparing::class => [
            \Modules\CustomFields\Listeners\Export\AppendRows::class,
        ],
        \Modules\CustomFields\Events\LocationCodeReplacing::class => [
            \Modules\CustomFields\Listeners\ReplaceModalsLocationCode::class,
        ],
        'cloner::cloned: App\Models\Document\Document' => [
            \Modules\CustomFields\Listeners\CloneField::class,
        ],
        'cloner::cloned: App\Models\Document\DocumentItem' => [
            \Modules\CustomFields\Listeners\CloneField::class,
        ],
        'cloner::cloned: App\Models\Common\Company' => [
            \Modules\CustomFields\Listeners\CloneField::class,
        ],
        'cloner::cloned: App\Models\Common\Item' => [
            \Modules\CustomFields\Listeners\CloneField::class,
        ],
        'cloner::cloned: App\Models\Common\Contact' => [
            \Modules\CustomFields\Listeners\CloneField::class,
        ],
        'cloner::cloned: App\Models\Banking\Account' => [
            \Modules\CustomFields\Listeners\CloneField::class,
        ],
        'cloner::cloned: App\Models\Banking\Transfer' => [
            \Modules\CustomFields\Listeners\CloneField::class,
        ],
        'cloner::cloned: App\Models\Banking\Transaction' => [
            \Modules\CustomFields\Listeners\CloneField::class,
        ],
        'eloquent.saved: Modules\Employees\Models\Employee' => [
            \Modules\CustomFields\Listeners\Employees\EmployeeSaved::class,
        ],
        'eloquent.deleted: Modules\Employees\Models\Employee' => [
            \Modules\CustomFields\Listeners\Employees\EmployeeDeleted::class,
        ],
        'eloquent.saved: Modules\Employees\Models\Position' => [
            \Modules\CustomFields\Listeners\Employees\PositionSaved::class,
        ],
        'eloquent.deleted: Modules\Employees\Models\Position' => [
            \Modules\CustomFields\Listeners\Employees\PositionDeleted::class,
        ],
        'eloquent.saved: Modules\Assets\Models\Asset' => [
            \Modules\CustomFields\Listeners\Assets\AssetSaved::class,
        ],
        'eloquent.deleted: Modules\Assets\Models\Asset' => [
            \Modules\CustomFields\Listeners\Assets\AssetDeleted::class,
        ],
    ];
}
