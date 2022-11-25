<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoryV201 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_items', function($table) {
            $table->integer('opening_stock')->nullable()->change();
            $table->integer('opening_stock_value')->nullable()->change();
            $table->integer('reorder_level')->nullable()->change();
        });

        Schema::table('inventory_histories', function($table) {
            $table->integer('quantity')->change();
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
            $table->double('opening_stock', 7, 2)->nullable()->change();
            $table->double('opening_stock_value', 15, 4)->nullable()->change();
            $table->double('reorder_level')->nullable()->change();
        });

        Schema::table('inventory_histories', function (Blueprint $table) {
            $table->double('quantity', 7, 2)->change();
        });
    }
}
