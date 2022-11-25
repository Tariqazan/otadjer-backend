<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WarehouseRoleManagementV1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_user_warehouses', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('warehouse_id')->unsigned();

            $table->primary(['user_id', 'warehouse_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inventory_user_warehouses');
    }
}
