<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstimatesV211 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->integer('document_id');
            $table->integer('item_id');
            $table->string('item_type');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['company_id', 'item_id', 'item_type']);
            $table->index(['company_id', 'document_id', 'item_type']);
        });

        Schema::rename('estimate_extra_parameters', 'estimates_extra_parameters');
        Schema::rename('estimate_invoice', 'estimate_invoice_v20');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estimates_documents');
        Schema::rename('estimates_extra_parameters', 'estimate_extra_parameters');
        Schema::rename('estimate_invoice_v20', 'estimate_invoice');
    }
}
