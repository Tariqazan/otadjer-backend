<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalesPurchaseOrdersV1 extends Migration
{
    public function up(): void
    {
        Schema::create(
            'sales_purchase_orders_sales_extra_parameters',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('company_id');
                $table->integer('document_id');
                $table->dateTime('expected_shipment_date')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->index('document_id', 'spo_sep_document_id_index');
            }
        );
        Schema::create(
            'sales_purchase_orders_purchase_extra_parameters',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('company_id');
                $table->integer('document_id');
                $table->dateTime('expected_delivery_date')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->index('document_id', 'spo_pep_document_id_index');
            }
        );

        Schema::create(
            'sales_purchase_orders_documents',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('company_id');
                $table->integer('document_id');
                $table->integer('item_id');
                $table->string('item_type');
                $table->timestamps();
                $table->softDeletes();

                $table->index(['item_id', 'item_type']);
                $table->index(['document_id', 'item_type']);
            }
        );
    }

    public function down(): void
    {
        Schema::drop('sales_purchase_orders_sales_extra_parameters');
        Schema::drop('sales_purchase_orders_purchase_extra_parameters');
        Schema::drop('sales_purchase_orders_documents');
    }
}
