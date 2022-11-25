<?php

namespace Modules\Estimates\Listeners\Update\V20;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished as Event;
use App\Models\Auth\Permission;
use App\Models\Common\EmailTemplate;
use App\Models\Common\Report;
use App\Traits\Permissions;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Modules\Estimates\Database\Seeds\CustomFields;
use Modules\Estimates\Database\Seeds\EmailTemplates;
use Modules\Estimates\Database\Seeds\Reports;

class Version200 extends Listener
{
    use Permissions;

    const ALIAS = 'estimates';

    const VERSION = '2.0.0';

    /**
     * Handle the event.
     *
     * @param  $event
     *
     * @return void
     */
    public function handle(Event $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        $this->updateDatabase();

        $this->updateSettings();

        $this->callSeeders();

        $this->updatePermissions();

        $this->deleteOldFiles();
    }

    protected function updateDatabase()
    {
        if (DB::table('migrations')->where('migration', '2018_10_02_000000_estimates_v1')->first()) {
            return;
        }

        DB::table('migrations')->insert(
            [
                'id'        => DB::table('migrations')->max('id') + 1,
                'migration' => '2018_10_02_000000_estimates_v1',
                'batch'     => DB::table('migrations')->max('batch') + 1,
            ]
        );

        Artisan::call('migrate', ['--force' => true]);
    }

    protected function updateSettings()
    {
        if ($number_next = setting('general.estimate_number_next')) {
            setting()->set(['estimates.number_next' => $number_next]);
            setting()->forget('general.estimate_number_next');
        }

        setting()->forget('estimates.customer_email_text');

        setting()->save();
    }

    protected function callSeeders()
    {
        Artisan::call(
            'company:seed',
            [
                'company' => company_id(),
                '--class' => CustomFields::class,
            ]
        );

        Artisan::call(
            'company:seed',
            [
                'company' => company_id(),
                '--class' => EmailTemplates::class,
            ]
        );

        Artisan::call(
            'company:seed',
            [
                'company' => company_id(),
                '--class' => Reports::class,
            ]
        );
    }

    protected function updatePermissions()
    {
        if ($p = Permission::where('name', 'read-estimates-settings')->pluck('id')->first()) {
            return;
        }

        $this->attachPermissionsByRoleNames(
            [
                'admin'    => [
                    'estimates-estimates' => 'c,r,u,d',
                ],
                'manager'  => [
                    'estimates-estimates' => 'c,r,u,d',
                ],
                'customer' => [
                    'portal-estimates' => 'r,u',
                ],
            ]
        );

        $this->detachPermissionsByRoleNames(
            [
                'customer' => [
                    'read-customers-estimates',
                    'create-customers-estimates',
                    'update-customers-estimates',
                    'delete-customers-estimates',
                ],
            ]
        );

        $this->attachDefaultModulePermissions('estimates');
    }

    protected function deleteOldFiles()
    {
        $files = [
            'Assets/.gitkeep',
            'Config/.gitkeep',
            'Console/.gitkeep',
            'Database/Migrations/.gitkeep',
            'Database/Seeders/.gitkeep',
            'Events/.gitkeep',
            'Http/Controllers/.gitkeep',
            'Http/Middleware/.gitkeep',
            'Http/Requests/.gitkeep',
            'Jobs/.gitkeep',
            'Listeners/.gitkeep',
            'Mail/.gitkeep',
            'Models/.gitkeep',
            'Providers/.gitkeep',
            'Repositories/.gitkeep',
            'Resources/lang/.gitkeep',
            'Tests/.gitkeep',
            'Database/Migrations/2018_08_06_194625_create_estimates_table.php',
            'Database/Migrations/2018_08_06_195809_create_estimate_items_table.php',
            'Database/Migrations/2018_08_06_195846_create_estimate_statuses_table.php',
            'Database/Migrations/2018_08_06_195951_create_estimate_histories_table.php',
            'Database/Migrations/2018_08_07_182422_create_estimate_totals_table.php',
            'Database/Migrations/2018_08_07_190354_create_estimate_invoice_table.php',
            'Database/Migrations/2018_11_25_135129_create_estimate_item_taxes_table.php',
            'Database/Migrations/2019_01_20_181400_drop_estimate_tax_id_column.php',
            'Config/config.php',
            'Resources/views/estimates/estimates/create.blade.php',
            'Resources/views/estimates/estimates/edit.blade.php',
            'Resources/views/customers/estimates/estimate.blade.php',
            'Resources/views/estimates/estimates/estimate.blade.php',
            'Notifications/Customer/Estimate.php',
            'Filters/Estimates.php',
            'Http/Controllers/Customers/Estimates.php',
            'Listeners/EstimatesAdminMenu.php',
            'Listeners/EstimatesCustomerMenu.php',
            'Listeners/EstimatesModuleInstalled.php',
            'Console/EstimatesSeed.php',
            'Providers/EstimatesServiceProvider.php',
            'Database/Seeders/EstimatesStatuses.php',
            'Models/EstimateStatus.php',
            'Providers/EventServiceProvider.php',
            'Resources/lang/es-ES/general.php',
            'Resources/lang/fr-FR/general.php',
            'Resources/views/customers/estimates/index.blade.php',
            'Resources/views/estimates/estimates/index.blade.php',
            'Listeners/InvoiceCreated.php',
            'Resources/views/estimates/estimates/item.blade.php',
            'Resources/views/customers/estimates/link.blade.php',
            'Listeners/Updates/Listener.php',
            'Providers/ObserverServiceProvider.php',
            'Http/routes.php',
            'Resources/views/customers/estimates/show.blade.php',
            'Resources/views/estimates/estimates/show.blade.php',
            'start.php',
            'Listeners/Updates/Version103.php',
            'Listeners/Updates/Version104.php',
            'Listeners/Updates/Version105.php',
            'Providers/ViewComposerServiceProvider.php',
        ];

        $directories = [
            'Http/Controllers/Customers',
            'Http/Middleware',
            'Listeners/Updates',
            'Mail',
            'Notifications/Customer',
            'Repositories',
            'Resources/lang/es-ES',
            'Resources/lang/fr-FR',
            'Resources/views/customers',
            'Resources/views/estimates/estimates',
        ];

        foreach ($files as $file) {
            File::delete(base_path('modules/Estimates/' . $file));
        }

        foreach ($directories as $directory) {
            File::deleteDirectory(base_path('modules/Estimates/' . $directory));
        }
    }
}
