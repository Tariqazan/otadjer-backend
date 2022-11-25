<?php

namespace Modules\Estimates\Providers;

use App\Events\Document\DocumentCreated;
use App\Events\Document\DocumentUpdated;
use App\Events\Install\UpdateFinished;
use App\Events\Menu\AdminCreated;
use App\Events\Menu\ItemAuthorizing;
use App\Events\Menu\PortalCreated;
use App\Events\Module\Installed;
use App\Events\Module\SettingShowing;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as Provider;
use Modules\Estimates\Events\Approved;
use Modules\Estimates\Events\Refused;
use Modules\Estimates\Listeners\Document\DocumentCreated as DocumentCreatedListener;
use Modules\Estimates\Listeners\Document\DocumentUpdated as DocumentUpdatedListener;
use Modules\Estimates\Listeners\Estimate\CreateConvertedHistory;
use Modules\Estimates\Listeners\Estimate\MarkApproved;
use Modules\Estimates\Listeners\Estimate\MarkRefused;
use Modules\Estimates\Listeners\Menu\Admin;
use Modules\Estimates\Listeners\Menu\AuthorizeDropdownMenu;
use Modules\Estimates\Listeners\Menu\Portal;
use Modules\Estimates\Listeners\Module\CustomFieldsInstalled;
use Modules\Estimates\Listeners\Module\Installed as ModuleInstalled;
use Modules\Estimates\Listeners\Notification\SendApprove;
use Modules\Estimates\Listeners\Notification\SendRefuse;
use Modules\Estimates\Listeners\Report\AddCategories;
use Modules\Estimates\Listeners\Report\AddCustomers;
use Modules\Estimates\Listeners\Setting\ShowInSettingsPage;
use Modules\Estimates\Listeners\Update\V20\Version200;
use Modules\Estimates\Listeners\Update\V20\Version2010;
use Modules\Estimates\Listeners\Update\V20\Version2011;
use Modules\Estimates\Listeners\Update\V20\Version202;
use Modules\Estimates\Listeners\Update\V21\Version210;
use Modules\Estimates\Listeners\Update\V21\Version211;

class Event extends Provider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UpdateFinished::class  => [
            Version200::class,
            Version202::class,
            Version2010::class,
            Version2011::class,
            Version210::class,
            Version211::class,
        ],
        SettingShowing::class   => [
            ShowInSettingsPage::class,
        ],
        AdminCreated::class    => [
            Admin::class,
        ],
        PortalCreated::class   => [
            Portal::class,
        ],
        Installed::class       => [
            ModuleInstalled::class,
            CustomFieldsInstalled::class,
        ],
        DocumentCreated::class => [
            CreateConvertedHistory::class,
            DocumentCreatedListener::class,
        ],
        DocumentUpdated::class => [
            DocumentUpdatedListener::class,
        ],
        Approved::class        => [
            MarkApproved::class,
            SendApprove::class,
        ],
        Refused::class         => [
            MarkRefused::class,
            SendRefuse::class,
        ],
        ItemAuthorizing::class => [
            AuthorizeDropdownMenu::class,
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        AddCategories::class,
        AddCustomers::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        /*if (null !== module('custom-fields')) {
            EventFacade::listen(Created::class, CreateCustomFieldValue::class);
            EventFacade::listen(Updated::class, UpdateCustomFieldValue::class);
            EventFacade::listen(Deleted::class, DeleteCustomFieldValue::class);
            EventFacade::listen(CustomFieldLocationSortColumns::class, CustomFieldColumns::class);
        }*/
    }
}
