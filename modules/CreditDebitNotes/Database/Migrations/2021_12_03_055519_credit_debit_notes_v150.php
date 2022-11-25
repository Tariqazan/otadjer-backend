<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreditDebitNotesV150 extends Migration
{
    private $tables = [
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

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->tables as $table_name) {
            if (Schema::hasTable($table_name)) {
                Schema::table($table_name, function (Blueprint $table) {
                    $table->boolean('ready_to_be_pruned')->default(false);
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->tables as $table_name) {
            if (Schema::hasTable($table_name)) {
                Schema::table($table_name, function ($table) {
                    $table->dropColumn('ready_to_be_pruned');
                });
            }
        }
    }
}
