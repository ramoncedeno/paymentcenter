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
        Schema::create('sales', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table-> unsignedBigInteger('customer_id')->comment();
            $table-> unsignedBigInteger('employee_id_sale')->comment();
            $table-> unsignedBigInteger('employee_id_activation')->comment();
            $table-> unsignedBigInteger('trade_id')->comment();
            $table-> unsignedBigInteger('product_id')->comment();
            $table->timestamp('status_date')->nullable()->comment();
            $table->unsignedBigInteger('status_sale')->comment();
            $table-> string('origin')->comment();
            $table->timestamp('origin_date')->nullable()->comment();
            $table->timestamps();
            $table->softDeletes();

            //Forein keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('employee_id_sale')->references('id')->on('employees');
            $table->foreign('employee_id_activation')->references('id')->on('employees');
            $table->foreign('trade_id')->references('id')->on('trades');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('status_sale')->references('id')->on('general_statuses');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
