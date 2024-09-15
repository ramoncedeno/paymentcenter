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
            $table->id()->unsigned()->comment('Primary key, auto-incremental');
            $table->string('card',16)->comment('Credit Card Number');
            $table-> string('customer_name',255)->comment('customer name');
            $table-> date('member_since')->comment('account opening date');
            $table-> string('status_account_id',255)->comment('account status NUEVA or ANTIGUA [FK]');
            $table-> string('status_contract',255)->comment('contract status SI or NO [FK]');
            $table->timestamps();
            $table->softDeletes();
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
