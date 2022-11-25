<?php

namespace Modules\CreditDebitNotes\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished as Event;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Version150 extends Listener
{
    const ALIAS = 'credit-debit-notes';

    const VERSION = '1.5.0';

    public function handle(Event $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        $this->updateDatabase();

        $this->markRecordsAsReadyToBePrunedInOldTables();
    }

    public function updateDatabase()
    {
        Artisan::call('module:migrate', ['alias' => self::ALIAS, '--force' => true]);
    }

    public function markRecordsAsReadyToBePrunedInOldTables()
    {
        $tables = [
            'credit_note_histories',
            'credit_note_item_taxes',
            'credit_note_items',
            'credit_note_totals',
            'credit_notes',
            'credits_transactions',
            'debit_note_histories',
            'debit_note_item_taxes',
            'debit_note_items',
            'debit_note_totals',
            'debit_notes',
        ];

        foreach ($tables as $table_name) {
            if (Schema::hasTable($table_name)) {
                DB::table($table_name)
                    ->whereNull('deleted_at')
                    ->update(['ready_to_be_pruned' => true]);
            }
        }
    }
}
