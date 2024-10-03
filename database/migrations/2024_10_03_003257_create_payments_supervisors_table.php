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
            $table->unsignedBigInteger('payments_supervisors_sale_id')->comment('@');
            $table->unsignedBigInteger('payments_supervisors_cancellation_id')->comment('@');
            $table->unsignedBigInteger('payments_supervisors_rate_id')->comment('');
            $table->unsignedBigInteger('payments_supervisors_temporality_id')->comment('');
            $table->string('payments_supervisors_origin')->comment('Name of the record related to which it belongs');
            $table->timestamp('payments_supervisors_origin_date')->nullable()->comment('Date related to the origin of the record');
            $table->string('payments_supervisors_payment_method')->comment('payment method used (card, transfer)');


            // attributes related to the type of employee
            $table->unsignedBigInteger('payments_supervisors_payed_status_id')->comment('');
            $table->unsignedBigInteger('payments_supervisors_temporality_status_id')->comment('');
            $table->timestamp('payments_supervisors_effective_date')->nullable()->comment('From when the rate is applicable');
            $table->bigInteger('payments_supervisors_unit_price')->nullable()->comment('Unit price');
            $table->string('payments_supervisors_currency', 3)->nullable()->comment('Currency code in USD or MXN');
            $table->bigInteger('payments_supervisors_goal')->nullable()->comment('Sales or performance goal associated with the rate');
            $table->timestamps();
            $table->softDeletes();


            //forein keys_employee_2
            $table->foreign('payments_supervisors_sale_id')->references('id')->on('sales');
            $table->foreign('payments_supervisors_cancellation_id')->references('id')->on('cancellations');
            $table->foreign('payments_supervisors_rate_id')->references('id')->on('rates');
            $table->foreign('payments_supervisors_payed_status_id')->references('id')->on('general_statuses');
            $table->foreign('payments_supervisors_temporality_id')->references('id')->on('temporalities');
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
