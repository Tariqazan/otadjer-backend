<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrmV227 extends Migration
{
    /**
     * Run the migrations .
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crm_deals', function (Blueprint $table) {
            $table->string('currency_code', 3)->nullable()->after('color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crm_deals', function (Blueprint $table) {
            $table->dropColumn('currency_code');
        });
    }
}
