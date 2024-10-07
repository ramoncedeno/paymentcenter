<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments_employees', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->unsignedBigInteger('sale_id')->comment('@');
            $table->unsignedBigInteger('cancellation_id')->comment('@');
            $table->unsignedBigInteger('rate_id')->comment('');
            $table->unsignedBigInteger('temporality_id')->comment('');
            $table->string('origin')->comment('Name of the record related to which it belongs');
            $table->timestamp('origin_date')->nullable()->comment('Date related to the origin of the record');
            $table->string('payment_method')->comment('payment method used (card, transfer)');

            //   Reflection of migration rates
            $table->unsignedBigInteger('status_payed_to_employee_1')->comment('');
            $table->unsignedBigInteger('temporality_status_id_employee_1')->comment('');
            $table->timestamp('effective_date_employee_1')->nullable()->comment('From when the rate is applicable');
            $table->bigInteger('unit_price_employee_1')->nullable()->comment('Unit price');
            $table->string('currency_employee_1', 3)->nullable()->comment('Currency code in USD or MXN');
            $table->bigInteger('goal_employee_1')->nullable()->comment('Sales or performance goal associated with the rate');
            $table->timestamps();
            $table->softDeletes();

            //forein keys for employee
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('cancellation_id')->references('id')->on('cancellations');
            $table->foreign('rate_id')->references('id')->on('rates');
            $table->foreign('status_payed_to_employee_1')->references('id')->on('general_statuses');
            $table->foreign('temporality_status_id_employee_1')->references('id')->on('temporalities');





        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_employees');
    }
};
