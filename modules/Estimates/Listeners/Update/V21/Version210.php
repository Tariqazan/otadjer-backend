<?php

namespace Modules\Estimates\Listeners\Update\V21;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished as Event;
use App\Traits\Permissions;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class Version210 extends Listener
{
    use Permissions;

    const ALIAS = 'estimates';

    const VERSION = '2.1.0';

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

        $this->updateDatabase();
        $this->updateSettings();
        $this->copyEstimateExtraParams();
        $this->deleteOldFiles();
    }

    protected function updateDatabase()
    {
        Artisan::call('module:migrate', ['alias' => self::ALIAS, '--force' => true]);
    }

    protected function copyEstimateExtraParams()
    {
        if (false === Schema::hasTable('estimates_v20')) {
            return;
        }

        $estimates = DB::table('estimates_v20')->where('company_id', company_id())->cursor();

        foreach ($estimates as $estimate) {
            $document_id = DB::table('documents')
                             ->where(
                                 [
                                     'document_number' => $estimate->estimate_number,
                                     'deleted_at'      => $estimate->deleted_at,
                                     'company_id'      => $estimate->company_id,
                                     'type'            => 'estimate',
                                 ]
                             )
                             ->pluck('id')
                             ->first();

            DB::table('estimate_extra_parameters')
              ->insert(
                  [
                      'company_id'  => $estimate->company_id,
                      'document_id' => $document_id,
                      'expire_at'   => $estimate->expire_at,
                      'created_at'  => $estimate->created_at,
                      'updated_at'  => $estimate->updated_at,
                      'deleted_at'  => $estimate->deleted_at,
                  ]
              );
        }
    }

    protected function updateSettings(): void
    {
        $settings = [
            'estimates.number_digit'           => 'estimates.estimate.number_digit',
            'estimates.number_next'            => 'estimates.estimate.number_next',
            'estimates.number_prefix'          => 'estimates.estimate.number_prefix',
            'estimates.title'                  => 'estimates.estimate.title',
            'estimates.send_estimate_reminder' => 'estimates.schedule.send_estimate_reminder',
            'estimates.estimate_days'          => 'estimates.schedule.estimate_days',
        ];

        foreach ($settings as $key => $newKey) {
            if (null === setting($key)) {
                continue;
            }

            setting()->set([$newKey => setting($key)]);
            setting()->forget($key);
        }

        setting()->save();
    }

    protected function deleteOldFiles()
    {
        $files = [
            'Database/Factories/EstimateItem.php',
            'Events/Created.php',
            'Events/Creating.php',
            'Events/Deleting.php',
            'Events/Printing.php',
            'Events/Sent.php',
            'Events/Updated.php',
            'Events/Updating.php',
            'Events/Viewed.php',
            'Http/ViewComposers/EstimateText.php',
            'Jobs/Create.php',
            'Jobs/CreateHistory.php',
            'Jobs/CreateItem.php',
            'Jobs/Delete.php',
            'Jobs/Duplicate.php',
            'Jobs/Update.php',
            'Listeners/Estimate/CreateCreatedHistory.php',
            'Listeners/Estimate/IncreaseNextEstimateNumber.php',
            'Listeners/Estimate/MarkSent.php',
            'Listeners/Estimate/MarkViewed.php',
            'Listeners/Module/CreateCustomFieldValue.php',
            'Listeners/Module/CustomFieldColumns.php',
            'Listeners/Module/DeleteCustomFieldValue.php',
            'Listeners/Module/UpdateCustomFieldValue.php',
            'Models/Category.php',
            'Models/Company.php',
            'Models/EstimateHistory.php',
            'Models/EstimateItem.php',
            'Models/EstimateItemTax.php',
            'Models/EstimateTotal.php',
            'Resources/views/estimates/item.blade.php',
            'mix-manifest.json',
            'package.json',
            'webpack.mix.js',
        ];

        $directories = [
            'Http/Requests',
            'Resources/assets',
            'Traits',
        ];

        foreach ($files as $file) {
            File::delete(base_path('modules/Estimates/' . $file));
        }

        foreach ($directories as $directory) {
            File::deleteDirectory(base_path('modules/Estimates/' . $directory));
        }
    }
}
