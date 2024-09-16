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
            $table->id()->unsigned();
            $table->string('card',16)->comment('card number');
            $table->string('customer_name',255)->comment('customer name');
            $table->integer('product_id',10)->comment('id assigned to the product by the sponsor');
            $table->string ('status_sale_id',255)->comment('status assigned in the payment process');
            $table->string('status_cancellation_id',255)->comment('Cancellation status assigned in the process');
            $table->string('trade_id',1)->comment('category assigned to the store A,B,C');
            $table->date('sale_date')->comment('date on which the sale was made');
            $table->string('activation_user',50)->comment('user who activates the sale');
            $table->date('cancellation_date')->comment('date on which cancellation is made');
            $table->string('cancellation_user',50)->comment('user who makes the cancellation');
            $table->timestamps();
            $table->softDeletes();
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
