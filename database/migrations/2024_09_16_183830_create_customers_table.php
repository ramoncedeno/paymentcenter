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
            $table->string('customers_card',16)->comment('Credit Card Number');
            $table-> string('customers_customer_name')->comment('Customer name');
            $table-> timestamp('customers_member_since')->nullable()->comment('Account opening date');
            $table-> unsignedBigInteger('customers_status_account_id')->comment('Account status NEW or OLD'); //[FK]
            $table-> unsignedBigInteger('customers_status_contract_id')->comment('Contract status YES or NO ');//[FK]
            $table->timestamps();
            $table->softDeletes();

            //forein keys
            $table->foreign('customers_status_account_id')->references('id')->on('general_statuses');
            $table->foreign('customers_status_contract_id')->references('id')->on('general_statuses');


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
