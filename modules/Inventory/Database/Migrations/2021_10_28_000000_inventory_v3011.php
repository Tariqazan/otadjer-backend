<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoryV3011 extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_warehouses', function (Blueprint $table) {
            $table->string('state')->nullable()->after('enabled');
            $table->string('zip_code')->nullable()->after('enabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory_warehouses', function (Blueprint $table) {
            $table->dropColumn('state');
            $table->dropColumn('zip_code');
        });
    }
}
