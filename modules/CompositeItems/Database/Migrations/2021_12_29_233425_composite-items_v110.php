<?php

use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\Type;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompositeItemsV110 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('composite_items_composite_items', function (Blueprint $table) {
            $table->string('sku')->nullable()->after('item_id');
            $table->string('barcode')->nullable()->after('sku');
            $table->string('unit')->nullable()->after('barcode');
            $table->boolean('returnable')->default(0)->nullable()->after('unit');
            $table->boolean('track_inventory')->default(0)->nullable()->after('returnable');
            $table->string('created_from', 30)->nullable()->after('track_inventory');
        });

        Schema::table('composite_items_items', function (Blueprint $table) {
            $table->integer('warehouse_id')->nullable()->after('quantity');
            $table->string('created_by', 30)->nullable()->after('warehouse_id');
            $table->string('created_from', 30)->nullable()->after('created_by');
        });

        if (!Type::hasType('double')) {
            Type::addType('double', FloatType::class);
        }

        Schema::table('composite_items_items', function(Blueprint $table) {
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
        Schema::table('composite_items_composite_items', function (Blueprint $table) {
            $table->dropColumn('sku');
        });

        Schema::table('composite_items_composite_items', function (Blueprint $table) {
            $table->dropColumn('barcode');
        });

        Schema::table('composite_items_composite_items', function (Blueprint $table) {
            $table->dropColumn('unit');
        });

        Schema::table('composite_items_composite_items', function (Blueprint $table) {
            $table->dropColumn('returnable');
        });

        Schema::table('composite_items_composite_items', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('composite_items_composite_items', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('composite_items_items', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('composite_items_items', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('composite_items_items', function (Blueprint $table) {
            $table->dropColumn('warehouse_id');
        });
    }
}
