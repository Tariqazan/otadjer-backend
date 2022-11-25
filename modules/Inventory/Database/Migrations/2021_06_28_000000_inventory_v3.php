<?php

use Illuminate\Support\Facades\Schema;
use Modules\Inventory\Traits\Inventory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventoryV3 extends Migration
{
    use Inventory;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('inventory_item_group_options', 'inventory_item_group_variants');
        Schema::rename('inventory_item_group_option_items', 'inventory_item_group_variant_items');
        Schema::rename('inventory_item_group_option_values', 'inventory_item_group_variant_values');
        Schema::rename('inventory_options', 'inventory_variants');
        Schema::rename('inventory_option_values', 'inventory_variant_values');

        Schema::table('inventory_item_group_variants', function (Blueprint $table) {
            $table->renameColumn('option_id', 'variant_id');
        });

        Schema::table('inventory_item_group_variant_items', function (Blueprint $table) {
            $table->renameColumn('option_id', 'variant_id');
        });

        Schema::table('inventory_item_group_variant_items', function (Blueprint $table) {
            $table->renameColumn('option_value_id', 'variant_value_id');
        });

        Schema::table('inventory_item_group_variant_items', function (Blueprint $table) {
            $table->renameColumn('item_group_option_id', 'item_group_variant_id');
        });

        Schema::table('inventory_item_group_variant_values', function (Blueprint $table) {
            $table->renameColumn('item_group_option_id', 'item_group_variant_id');
        });

        Schema::table('inventory_item_group_variant_values', function (Blueprint $table) {
            $table->renameColumn('option_id', 'variant_id');
        });

        Schema::table('inventory_item_group_variant_values', function (Blueprint $table) {
            $table->renameColumn('option_value_id', 'variant_value_id');
        });

        Schema::table('inventory_variant_values', function (Blueprint $table) {
            $table->renameColumn('option_id', 'variant_id');
        });

        Schema::table('inventory_items', function (Blueprint $table) {
            $table->string('unit')->nullable()->before('reorder_level');
            $table->boolean('returnable')->default(0)->nullable()->before('unit');
        });

        Schema::table('inventory_warehouses', function (Blueprint $table) {
            $table->text('description')->nullable()->before('enabled');
            $table->string('country')->nullable()->before('enabled');
            $table->string('city')->nullable()->before('enabled');
        });

        Schema::table('inventory_transfer_orders', function(Blueprint $table) {
            $table->string('transfer_order_number')->default($this->getNextTransferOrderNumber())->before('transfer_order');
            $table->string('status')->default('draft')->before('transfer_order');
        });

        Schema::table('inventory_transfer_orders', function (Blueprint $table) {
            $table->integer('item_id')->nullable()->change();;
        });

        Schema::table('inventory_transfer_orders', function (Blueprint $table) {
            $table->integer('transfer_quantity')->nullable()->change();;
        });

        Schema::create('inventory_transfer_order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('transfer_order_id');
            $table->integer('item_id');
            $table->integer('item_quantity');
            $table->integer('transfer_quantity');

            $table->timestamps();
            $table->softDeletes();

            $table->index('company_id');
        });

        Schema::create('inventory_transfer_order_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('created_by');
            $table->integer('transfer_order_id');
            $table->string('status');

            $table->timestamps();
            $table->softDeletes();

            $table->index('company_id');
        });

        Schema::create('inventory_adjustments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->date('date')->nullable();
            $table->string('adjustment_number');
            $table->integer('warehouse_id');
            $table->text('description')->nullable();
            $table->string('reason');

            $table->timestamps();
            $table->softDeletes();

            $table->index('company_id');
        });

        Schema::create('inventory_adjustment_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('adjustment_id');
            $table->integer('item_id');
            $table->integer('item_quantity');
            $table->integer('adjusted_quantity');

            $table->timestamps();
            $table->softDeletes();

            $table->index('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('inventory_item_group_variants', 'inventory_item_group_options');
        Schema::rename('inventory_item_group_variant_items', 'inventory_item_group_option_items');
        Schema::rename('inventory_item_group_variant_values', 'inventory_item_group_option_values');
        Schema::rename('inventory_variants', 'inventory_options');
        Schema::rename('inventory_variant_values', 'inventory_option_values');

        Schema::table('inventory_item_group_options', function (Blueprint $table) {
            $table->renameColumn('variant_id', 'option_id');
        });

        Schema::table('inventory_item_group_option_items', function (Blueprint $table) {
            $table->renameColumn('variant_id', 'option_id');
        });

        Schema::table('inventory_item_group_option_items', function (Blueprint $table) {
            $table->renameColumn('variant_value_id', 'option_value_id');
        });

        Schema::table('inventory_item_group_option_items', function (Blueprint $table) {
            $table->renameColumn('item_group_variant_id', 'item_group_option_id');
        });

        Schema::table('inventory_item_group_option_values', function (Blueprint $table) {
            $table->renameColumn('item_group_variant_id', 'item_group_option_id');
        });

        Schema::table('inventory_item_group_option_values', function (Blueprint $table) {
            $table->renameColumn('variant_id', 'option_id');
        });

        Schema::table('inventory_item_group_option_values', function (Blueprint $table) {
            $table->renameColumn('variant_value_id', 'option_value_id');
        });

        Schema::table('inventory_option_values', function (Blueprint $table) {
            $table->renameColumn('variant_id', 'option_id');
        });

        Schema::table('inventory_items', function (Blueprint $table) {
            $table->dropColumn('unit');
        });

        Schema::table('inventory_items', function (Blueprint $table) {
            $table->dropColumn('returnable');
        });

        Schema::table('inventory_warehouses', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        // Schema::table('inventory_transfer_orders', function(Blueprint $table) {
        //     $table->integer('item_id')->before('company_id')->default(1);
        // });

        // Schema::table('inventory_transfer_orders', function(Blueprint $table) {
        //     $table->integer('transfer_quantity')->before('transfer_order')->default(1);
        // });

        Schema::table('inventory_transfer_orders', function (Blueprint $table) {
            $table->dropColumn('transfer_order_number');
        });

        Schema::table('inventory_transfer_orders', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::dropIfExists('inventory_transfer_order_items');
        Schema::dropIfExists('inventory_transfer_order_histories');
        Schema::drop('inventory_adjustments');
        Schema::drop('inventory_adjustment_items');
    }
}
