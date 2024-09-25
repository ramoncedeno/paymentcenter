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
            $table->string('trade_name')->comment('Name of the trade');
            $table->string('address')->comment('');
            $table->string('contact_phone_number')->comment('');
            $table->unsignedBigInteger('trade_category')->comment('category assigned to trades');
            $table->timestamps();
            $table->softDeletes();

            //forein key

            $table->foreign('trade_category')->references('id')->on('trade_categories');

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
