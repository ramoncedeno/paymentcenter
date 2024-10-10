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
        Schema::create('payments_ees', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->unsignedBigInteger('payment_ees_sale_id')->comment('@');
            $table->unsignedBigInteger('payment_ees_cancellation_id')->comment('@');
            $table->unsignedBigInteger('payment_ees_rate_id')->comment('');
            $table->unsignedBigInteger('payment_ees_frequency_id')->comment('');
            $table->string('payment_ees_origin')->comment('Name of the record related to which it belongs');
            $table->timestamp('payment_ees_origin_date')->nullable()->comment('Date related to the origin of the record');
            $table->string('payment_ees_payment_method')->comment('payment method used (card, transfer)');

            //   Reflection of migration rates
            $table->unsignedBigInteger('payment_ees_status_payed_to_employee')->comment('');
            $table->unsignedBigInteger('payment_ees_frequency_status_id_employee')->comment('');
            $table->timestamp('payment_ees_effective_date_employee')->nullable()->comment('From when the rate is applicable');
            $table->bigInteger('payment_ees_unit_price_employee')->nullable()->comment('Unit price');
            $table->string('payment_ees_currency_employee', 3)->nullable()->comment('Currency code in USD or MXN');
            $table->bigInteger('payment_ees_goal_employee')->nullable()->comment('Sales or performance goal associated with the rate');
            $table->timestamps();
            $table->softDeletes();

            //forein keys for employee
            $table->foreign('payment_ees_sale_id')->references('id')->on('sales');
            $table->foreign('payment_ees_cancellation_id')->references('id')->on('cancellations');
            $table->foreign('payment_ees_rate_id')->references('id')->on('rates');
            $table->foreign('payment_ees_status_payed_to_employee')->references('id')->on('general_statuses');
            $table->foreign('payment_ees_frequency_status_id_employee')->references('id')->on('frequencies');





        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_ees');
    }
};
