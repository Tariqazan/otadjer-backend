<?php

namespace Modules\Estimates\Listeners\Update\V21;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished as Event;
use App\Models\Document\Document;
use App\Traits\Permissions;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Version211 extends Listener
{
    use Permissions;

    const ALIAS = 'estimates';

    const VERSION = '2.1.1';

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
        $this->publishAssets();
        $this->copyEstimateInvoiceTable();
        $this->modifyPermissions();
        $this->deleteOldFiles();
    }

    protected function updateDatabase()
    {
        Artisan::call('module:migrate', ['alias' => self::ALIAS, '--force' => true]);
    }

    protected function publishAssets()
    {
        Artisan::call('vendor:publish', ['--tag' => 'public', '--force' => true]);
    }

    protected function copyEstimateInvoiceTable()
    {
        $estimates = DB::table('estimate_invoice_v20')
                       ->join('documents', 'estimate_id', '=', 'documents.id')
                       ->where('company_id', company_id())
                       ->cursor();

        foreach ($estimates as $estimate) {
            DB::table('estimates_documents')
              ->insert(
                  [
                      'company_id'  => $estimate->company_id,
                      'document_id' => $estimate->estimate_id,
                      'item_id'     => $estimate->invoice_id,
                      'item_type'   => Document::class,
                      'created_at'  => $estimate->created_at,
                      'updated_at'  => $estimate->updated_at,
                      'deleted_at'  => $estimate->deleted_at,
                  ]
              );
        }
    }

    protected function deleteOldFiles()
    {
        $files = [
            'Models/EstimateInvoice.php',
        ];

        foreach ($files as $file) {
            File::delete(base_path('modules/Estimates/' . $file));
        }
    }

    protected function modifyPermissions(): void
    {
        DB::table('permissions')
          ->whereIn('name', ['read-estimates-settings', 'update-estimates-settings'])
          ->delete();

        $this->attachPermissionsToAdminRoles(['estimates-settings-estimate' => 'r,u']);
    }

}
