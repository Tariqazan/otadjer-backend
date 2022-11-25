<?php

use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoryV2020 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_items', function($table) {
            $table->integer('warehouse_id')->nullable()->before('item_id');

            $table->dropUnique(['company_id', 'sku', 'deleted_at']);
        });

        //Inventory Bill Items
        Schema::create('inventory_bill_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('bill_id');
            $table->integer('item_id');
            $table->integer('warehouse_id')->nullable();
            $table->double('quantity', 7, 2)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('company_id');
        });

        //Inventory Invoice Items
        Schema::create('inventory_invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('invoice_id');
            $table->integer('item_id');
            $table->integer('warehouse_id')->nullable();
            $table->double('quantity', 7, 2)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('company_id');
        });

        //Transfer Orders
        Schema::create('inventory_transfer_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('item_id');
            $table->date('date')->nullable();
            $table->string('transfer_order');
            $table->string('reason')->nullable();
            $table->integer('transfer_quantity');
            $table->integer('source_warehouse_id');
            $table->integer('destination_warehouse_id');

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
        Schema::dropIfExists('inventory_bill_items');
        Schema::dropIfExists('inventory_invoice_items');
        Schema::dropIfExists('inventory_transfer_orders');
    }
}
