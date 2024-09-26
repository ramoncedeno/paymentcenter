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
            $table->unsignedBigInteger('sale_id')->comment('Status assigned in the payment process');//FK
            $table->unsignedBigInteger('cancellation_id')->comment('Cancellation status assigned in the process');//FK
            $table-> string('origin')->comment();
            $table->timestamp('origin_date')->nullable()->comment();
            $table->timestamps();
            $table->softDeletes();

            //forein keys
            // $table->foreign('product_name_id')->references('id')->on('products');
            // $table->foreign('status_sale_id')->references('id')->on('general_statuses');
            // $table->foreign('status_cancellation_id')->references('id')->on('general_statuses');
            // $table->foreign('status_trade_id')->references('id')->on('trades');


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
