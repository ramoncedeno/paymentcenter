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
        Schema::create('cancellation', function (Blueprint $table) {
            $table->id();

            $table->string('card', 16)->comment('Card number');
            $table->string('cardholder', 255)->comment('Name of the cardholder');
            $table->timestamp('sale_date')->nullable()->comment('Date of sale');
            $table->string('user', 255)->comment('User who performed the sale');
            $table->string('arca_user', 255)->comment('ARCA system user');
            $table->string('executive', 255)->comment('Sales executive name');
            $table->string('employee_num', 255)->comment('Employee number');
            $table->string('commerce', 255)->comment('Commerce or store');
            $table->unsignedBigInteger('product_idasigned')->comment('ID of the assigned product');
            $table->string('product_name', 255)->comment('Name of the assigned product');
            $table->unsignedBigInteger('product_status')->comment('Status of the product');
            $table->timestamp('status_date')->nullable()->comment('Date when status was updated');
            $table->string('billed_periods', 255)->comment('Number of billed periods');
            $table->timestamp('cancellation_date')->nullable()->comment('Date of cancellation');
            $table->string('cancellation_user', 255)->comment('User who processed the cancellation');
            $table->string('employee', 255)->comment('Employee handling the case');
            $table->string('activation_user', 255)->comment('User who activated the product');
            $table->string('cancellation_name', 255)->comment('Name of the person cancelling the product');
            $table->string('cancelation_user_num', 255)->comment('User number who handled the cancellation');
            $table->string('cancelation_user_arca', 255)->comment('ARCA system user for cancellation');
            $table->timestamps();
            $table->softDeletes();

            //Forein keys

            $table->foreign('product_status')->references('id')->on('general_status');
            $table->foreign('product_idasigned')->references('id')->on('product');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancellation');
    }
};
