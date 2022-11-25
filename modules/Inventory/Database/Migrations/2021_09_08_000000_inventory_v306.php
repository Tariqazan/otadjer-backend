<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoryV306 extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_adjustments', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('reason');
            $table->string('created_from', 30)->nullable()->after('reason');
        });

        Schema::table('inventory_adjustment_items', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('adjusted_quantity');
            $table->string('created_from', 30)->nullable()->after('adjusted_quantity');
        });

        Schema::table('inventory_document_items', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('quantity');
            $table->string('created_from', 30)->nullable()->after('quantity');
        });

        Schema::table('inventory_histories', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('quantity');
            $table->string('created_from', 30)->nullable()->after('quantity');
        });

        Schema::table('inventory_items', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('vendor_id');
            $table->string('created_from', 30)->nullable()->after('vendor_id');
        });

        Schema::table('inventory_item_groups', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('enabled');
            $table->string('created_from', 30)->nullable()->after('enabled');
        });

        Schema::table('inventory_item_group_items', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('item_group_id');
            $table->string('created_from', 30)->nullable()->after('item_group_id');
        });

        Schema::table('inventory_item_group_variants', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('variant_id');
            $table->string('created_from', 30)->nullable()->after('variant_id');
        });

        Schema::table('inventory_item_group_variant_items', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('item_group_variant_id');
            $table->string('created_from', 30)->nullable()->after('item_group_variant_id');
        });

        Schema::table('inventory_item_group_variant_values', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('variant_value_id');
            $table->string('created_from', 30)->nullable()->after('variant_value_id');
        });

        Schema::table('inventory_transfer_orders', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('destination_warehouse_id');
            $table->string('created_from', 30)->nullable()->after('destination_warehouse_id');
        });

        Schema::table('inventory_transfer_order_histories', function (Blueprint $table) {
            $table->string('created_from', 30)->nullable()->after('status');
        });

        Schema::table('inventory_transfer_order_items', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('transfer_quantity');
            $table->string('created_from', 30)->nullable()->after('transfer_quantity');
        });

        Schema::table('inventory_variants', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('enabled');
            $table->string('created_from', 30)->nullable()->after('enabled');
        });

        Schema::table('inventory_variant_values', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('name');
            $table->string('created_from', 30)->nullable()->after('name');
        });

        Schema::table('inventory_warehouses', function (Blueprint $table) {
            $table->string('created_by', 30)->nullable()->after('enabled');
            $table->string('created_from', 30)->nullable()->after('enabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory_adjustments', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_adjustments', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_adjustment_items', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_adjustment_items', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_document_items', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_document_items', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_histories', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_histories', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_items', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_items', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_item_groups', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_item_groups', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_item_group_items', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_item_group_items', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_item_group_variants', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_item_group_variants', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_item_group_variant_items', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_item_group_variant_items', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_item_group_variant_values', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_item_group_variant_values', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_transfer_orders', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_transfer_orders', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_transfer_order_histories', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_transfer_order_histories', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_transfer_order_items', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_transfer_order_items', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_variants', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_variants', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_variant_values', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_variant_values', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('inventory_warehouses', function (Blueprint $table) {
            $table->dropColumn('created_from');
        });

        Schema::table('inventory_warehouses', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
}
