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
        Schema::create('commerce', function (Blueprint $table) {
            $table->id();
            $table->string('trade_name',255)->comment('name of the trade');
            $table->unsignedBigInteger('commerce_category')->comment('trade category');
            $table->timestamps();
            $table->softDeletes();

            //forein key

            $table->foreign('commerce_category')->references('id')->on('trade_category');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commerce');
    }
};
