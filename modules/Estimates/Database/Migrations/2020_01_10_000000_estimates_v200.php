<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstimatesV200 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $rename_estimates = [
            'estimate_status_code' => 'status',
            'customer_id'          => 'contact_id',
            'customer_name'        => 'contact_name',
            'customer_email'       => 'contact_email',
            'customer_tax_number'  => 'contact_tax_number',
            'customer_phone'       => 'contact_phone',
            'customer_address'     => 'contact_address',
        ];

        foreach ($rename_estimates as $from => $to) {
            Schema::table(
                'estimates',
                function (Blueprint $table) use ($from, $to) {
                    $table->renameColumn($from, $to);
                }
            );
        }

        Schema::table(
            'estimate_histories',
            function (Blueprint $table) {
                $table->renameColumn('status_code', 'status');
            }
        );

        Schema::drop('estimate_statuses');

        Schema::table(
            'estimates',
            function ($table) {
                $table->text('footer')->nullable();
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
        $rename_estimates = [
            'status'             => 'estimate_status_code',
            'contact_id'         => 'customer_id',
            'contact_name'       => 'customer_name',
            'contact_email'      => 'customer_email',
            'contact_tax_number' => 'customer_tax_number',
            'contact_phone'      => 'customer_phone',
            'contact_address'    => 'customer_address',
        ];

        foreach ($rename_estimates as $from => $to) {
            Schema::table(
                'estimates',
                function (Blueprint $table) use ($from, $to) {
                    $table->renameColumn($from, $to);
                }
            );
        }

        Schema::table(
            'estimate_histories',
            function (Blueprint $table) {
                $table->renameColumn('status', 'status_code');
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

        Schema::table(
            'estimates',
            function ($table) {
                $table->dropColumn('footer');
            }
        );
    }
}
