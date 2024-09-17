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
        Schema::create('customer', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('card',16)->comment('Credit Card Number');
            $table-> string('customer_name',255)->comment('customer name');
            $table-> date('member_since')->comment('account opening date');
            $table-> unsignedBigInteger('status_account')->comment('account status NUEVA or ANTIGUA [FK]');
            $table-> unsignedBigInteger('status_contract')->comment('contract status SI or NO [FK]');
            $table->timestamps();
            $table->softDeletes();

            //forein keys
            $table->foreign('status_account')->references('id')->on('general_status');
            $table->foreign('status_contract')->references('id')->on('general_status');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
