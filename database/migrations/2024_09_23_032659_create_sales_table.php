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
            $table->unsignedBigInteger('customer_id')->comment('Customer ID');
            $table->unsignedBigInteger('employee_sale_id')->comment('Sales employee ID');
            $table->unsignedBigInteger('employee_activation_id')->comment('Activation employee ID');
            $table->unsignedBigInteger('trade_id')->comment('Trade ID');
            $table->unsignedBigInteger('product_id')->comment('Product ID');
            $table->timestamp('sale_status_date')->nullable()->comment('Sale status date');
            $table->unsignedBigInteger('status_sale_id')->comment('Sale status ID');
            $table->string('origin')->comment('Sale origin');
            $table->timestamp('origin_date')->nullable()->comment('Sale origin date');
            $table->timestamps();
            $table->softDeletes();

            //Forein keys
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('employee_sale_id')->references('id')->on('employees');
            $table->foreign('employee_activation_id')->references('id')->on('employees');
            $table->foreign('trade_id')->references('id')->on('trades');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('status_sale_id')->references('id')->on('general_statuses');


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
