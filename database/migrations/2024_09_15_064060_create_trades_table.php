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
        Schema::create('trades', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('trades_trade_name')->comment('Name of the trade');
            $table->string('trades_address')->comment('Direction of trade');
            $table->string('trades_contact_phone_number')->comment('Contact number of the trade');
            $table->unsignedBigInteger('trades_trade_category_id')->comment('Category assigned to trades');
            $table->timestamps();
            $table->softDeletes();

            //forein key

            $table->foreign('trades_trade_category_id')->references('id')->on('trades_categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
