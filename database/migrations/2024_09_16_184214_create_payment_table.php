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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('card',16)->comment('card number');
            $table->string('customer_name',255)->comment('customer name');
            $table->unsignedBigInteger('product_idname')->comment('id assigned to the product by the sponsor'); //FK
            $table->unsignedBigInteger('status_sale')->comment('status assigned in the payment process');//FK
            $table->unsignedBigInteger('status_cancellation')->comment('Cancellation status assigned in the process');//FK
            $table->unsignedBigInteger('status_trade')->comment('category assigned to the store A,B,C');//FK
            $table->date('sale_date')->comment('date on which the sale was made');
            $table->string('activation_user',50)->comment('user who activates the sale');
            $table->date('cancellation_date')->comment('date on which cancellation is made');
            $table->string('cancellation_user',50)->comment('user who makes the cancellation');
            $table->timestamps();
            $table->softDeletes();

            //forein keys
            $table->foreign('product_idname')->references('id')->on('product');
            $table->foreign('status_sale')->references('id')->on('general_status');
            $table->foreign('status_cancellation')->references('id')->on('general_status');
            $table->foreign('status_trade')->references('id')->on('commerce');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
