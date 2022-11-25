<?php

use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoryV202 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Type::hasType('double')) {
            Type::addType('double', FloatType::class);
        }

        Schema::table('inventory_items', function(Blueprint $table) {
            $table->double('opening_stock', 15, 4)->nullable()->change();
            $table->double('opening_stock_value', 15, 4)->nullable()->change();
            $table->double('reorder_level', 15, 4)->nullable()->change();
        });

        Schema::table('inventory_histories', function($table) {
            $table->double('quantity', 15, 4)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
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
}
