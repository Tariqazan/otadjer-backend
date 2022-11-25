<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstimatesV210 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'estimate_extra_parameters',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('company_id');
                $table->integer('document_id');
                $table->dateTime('expire_at')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->index('document_id');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estimate_extra_parameters');
    }
}
