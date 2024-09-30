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
        Schema::create('customers', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('card',16)->comment('Credit Card Number');
            $table-> string('customer_name')->comment('Customer name');
            $table-> date('member_since')->comment('Account opening date');
            $table-> unsignedBigInteger('status_account')->comment('Account status NEW or OLD'); //[FK]
            $table-> unsignedBigInteger('status_contract')->comment('Contract status YES or NO ');//[FK]
            $table->timestamps();
            $table->softDeletes();

            //forein keys
            $table->foreign('status_account')->references('id')->on('general_statuses');
            $table->foreign('status_contract')->references('id')->on('general_statuses');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
