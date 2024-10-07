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
        Schema::create('payments_supervisors', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->unsignedBigInteger('supervisors_sale_id')->comment('@');
            $table->unsignedBigInteger('supervisors_cancellation_id')->comment('@');
            $table->unsignedBigInteger('supervisors_rate_id')->comment('@');
            $table->unsignedBigInteger('supervisors_temporality_id')->comment('@');
            $table->string('supervisors_origin')->comment('Name of the record related to which it belongs');
            $table->timestamp('supervisors_origin_date')->nullable()->comment('Date related to the origin of the record');
            $table->string('supervisors_payment_method')->comment('payment method used (card, transfer)');


            // attributes related to the type of employee
            $table->unsignedBigInteger('supervisors_payed_status_id')->comment('');
            $table->unsignedBigInteger('supervisors_temporality_status_id')->comment('');
            $table->timestamp('supervisors_effective_date')->nullable()->comment('From when the rate is applicable');
            $table->bigInteger('supervisors_unit_price')->nullable()->comment('Unit price');
            $table->string('supervisors_currency', 3)->nullable()->comment('Currency code in USD or MXN');
            $table->bigInteger('supervisors_goal')->nullable()->comment('Sales or performance goal associated with the rate');
            $table->timestamps();
            $table->softDeletes();


            //forein keys for supervisor
            $table->foreign('supervisors_sale_id')->references('id')->on('sales');
            $table->foreign('supervisors_cancellation_id')->references('id')->on('cancellations');
            $table->foreign('supervisors_rate_id')->references('id')->on('rates');
            $table->foreign('supervisors_payed_status_id')->references('id')->on('general_statuses');
            $table->foreign('supervisors_temporality_status_id')->references('id')->on('temporalities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments_supervisors');
    }
};
