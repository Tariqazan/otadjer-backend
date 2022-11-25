<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrmV2213 extends Migration
{
    /**
     * Run the migrations .
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_schedules', function (Blueprint $table) {
            $table->renameColumn('type', 'schedule_type');
        });

        Schema::table('crm_logs', function (Blueprint $table) {
            $table->renameColumn('type', 'log_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_schedules', function (Blueprint $table) {
            $table->renameColumn('schedule_type', 'type');
        });

        Schema::table('crm_logs', function (Blueprint $table) {
            $table->renameColumn('log_type', 'type');
        });
    }
}
