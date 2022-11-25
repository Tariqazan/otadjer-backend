<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventoryV220 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Item group items
        Schema::create('inventory_item_group_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('item_id');
            $table->integer('item_group_id');

            $table->timestamps();
            $table->softDeletes();

            $table->index('company_id');
        });

        Schema::table('inventory_item_group_option_values', function (Blueprint $table) {
            $table->integer('item_id')->nullable()->before('item_group_id');
            $table->integer('item_group_item_id')->nullable()->before('item_group_item_id');
            $table->integer('item_group_option_id')->nullable()->change();
        });

        Schema::table('inventory_options', function(Blueprint $table) {
            $table->string('type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_item_group_items');

        Schema::table('inventory_item_group_option_values', function (Blueprint $table) {
            $table->integer('item_group_option_id')->change();
        });

        Schema::table('inventory_options', function(Blueprint $table) {
            $table->string('type')->change();
        });
    }
}
