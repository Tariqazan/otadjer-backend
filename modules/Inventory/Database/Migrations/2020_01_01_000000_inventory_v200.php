<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoryV200 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_items', function($table) {
            $table->string('sku')->nullable()->before('item_id');

            $table->unique(['company_id', 'sku', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory_items', function (Blueprint $table) {
            $table->dropColumn('sku');
        });
    }
}
