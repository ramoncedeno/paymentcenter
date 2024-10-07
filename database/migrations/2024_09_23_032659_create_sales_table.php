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
            $table->unsignedBigInteger('sales_customer_id')->comment('Customer ID');
            $table->unsignedBigInteger('sales_employee_sale_id')->comment('Sales employee ID');
            $table->unsignedBigInteger('sales_employee_activation_id')->comment('Activation employee ID');
            $table->unsignedBigInteger('sales_trade_id')->comment('Trade ID');
            $table->unsignedBigInteger('sales_product_id')->comment('Product ID');
            $table->timestamp('sales_sale_status_date')->nullable()->comment('Sale status date');
            $table->unsignedBigInteger('sales_status_sale_id')->comment('Sale status ID');
            $table->string('sales_origin')->comment('Sale origin');
            $table->timestamp('sales_origin_date')->nullable()->comment('Sale origin date');
            $table->timestamps();
            $table->softDeletes();

            //Forein keys
            $table->foreign('sales_customer_id')->references('id')->on('customers');
            $table->foreign('sales_employee_sale_id')->references('id')->on('sales');
            $table->foreign('sales_employee_activation_id')->references('id')->on('employees');
            $table->foreign('sales_trade_id')->references('id')->on('trades');
            $table->foreign('sales_product_id')->references('id')->on('products');
            $table->foreign('sales_status_sale_id')->references('id')->on('general_statuses');


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
