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
        Schema::create('payments', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->unsignedBigInteger('sale_id')->comment('@');
            $table->unsignedBigInteger('cancellation_id')->comment('@');
            $table->unsignedBigInteger('rate_id')->comment('');
            $table->unsignedBigInteger('temporality_id')->comment('');
            $table->string('origin')->comment('Name of the record related to which it belongs');
            $table->timestamp('origin_date')->nullable()->comment('Date related to the origin of the record');
            $table->string('payment_method')->comment('payment method used (card, transfer)');
            $table->unsignedBigInteger('status_payment')->comment('');

            //   Reflection of migration rates
            $table->unsignedBigInteger('temporality_status_id')->comment('Rate recurrence');
            $table->bigInteger('unit_price')->nullable()->comment('Unit price');
            $table->string('currency', 3)->comment('Currency code in USD or MXN');
            $table->bigInteger('goal')->comment('Sales or performance goal associated with the rate');
            $table->timestamp('effective_date')->nullable()->comment('From when the rate is applicable');

            // attributes related to the type of employee
            $table->string('payed_to_employee_1')->comment('');
            $table->string('payed_to_employee_2')->comment('');

            // auditable attributes of the table
            $table->timestamps();
            $table->softDeletes();

            //forein keys
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('cancellation_id')->references('id')->on('cancellations');
            $table->foreign('rate_id')->references('id')->on('rates');
            $table->foreign('temporality_id')->references('id')->on('temporalities');
            $table->foreign('status_payment')->references('id')->on('general_statuses');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
