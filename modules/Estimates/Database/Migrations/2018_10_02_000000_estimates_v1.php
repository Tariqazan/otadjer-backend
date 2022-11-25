<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstimatesV1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'estimates',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('company_id');
                $table->integer('category_id')->default(0);
                $table->string('estimate_number');
                $table->string('estimate_status_code');
                $table->dateTime('estimated_at');
                $table->dateTime('expire_at')->nullable();
                $table->double('amount', 15, 4);
                $table->string('currency_code');
                $table->double('currency_rate', 15, 8);
                $table->integer('customer_id');
                $table->string('customer_name');
                $table->string('customer_email')->nullable();
                $table->string('customer_tax_number')->nullable();
                $table->string('customer_phone')->nullable();
                $table->text('customer_address')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->index('company_id');
                $table->unique(['company_id', 'estimate_number', 'deleted_at']);
            }
        );

        Schema::create(
            'estimate_items',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('company_id');
                $table->integer('estimate_id');
                $table->integer('item_id')->nullable();
                $table->string('name');
                $table->string('sku')->nullable();
                $table->double('quantity', 7, 2);
                $table->double('price', 15, 4);
                $table->double('total', 15, 4);
                $table->double('tax', 15, 4)->default('0.0000');
                $table->timestamps();
                $table->softDeletes();

                $table->index('company_id');
            }
        );

        Schema::create(
            'estimate_item_taxes',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('company_id');
                $table->integer('estimate_id');
                $table->integer('estimate_item_id');
                $table->integer('tax_id');
                $table->string('name');
                $table->double('amount', 15, 4)->default('0.0000');
                $table->timestamps();
                $table->softDeletes();

                $table->index('company_id');
            }
        );

        Schema::create(
            'estimate_statuses',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('company_id');
                $table->string('name');
                $table->string('code');
                $table->timestamps();
                $table->softDeletes();

                $table->index('company_id');
            }
        );

        Schema::create(
            'estimate_histories',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('company_id');
                $table->integer('estimate_id');
                $table->string('status_code');
                $table->boolean('notify');
                $table->text('description')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->index('company_id');
            }
        );

        Schema::create(
            'estimate_totals',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('company_id');
                $table->integer('estimate_id');
                $table->string('code')->nullable();
                $table->string('name');
                $table->double('amount', 15, 4);
                $table->integer('sort_order');
                $table->timestamps();
                $table->softDeletes();

                $table->index('company_id');
            }
        );

        Schema::create(
            'estimate_invoice',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('estimate_id');
                $table->integer('invoice_id');
                $table->timestamps();
                $table->softDeletes();

                $table->index('estimate_id');
                $table->unique(['estimate_id', 'invoice_id', 'deleted_at']);
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
        Schema::drop('estimates');
        Schema::drop('estimate_items');
        Schema::drop('estimate_item_taxes');
        Schema::drop('estimate_statuses');
        Schema::drop('estimate_histories');
        Schema::drop('estimate_totals');
        Schema::drop('estimate_invoice');
    }
}
