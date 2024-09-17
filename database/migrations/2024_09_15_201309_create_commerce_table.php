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
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('trade_name',255)->comment('name of the trade');
            $table->unsignedBigInteger('category_name')->comment('trade category');
            $table->timestamps();
            $table->softDeletes();

            //forein key

            // $table->foreign('category_name')->references('id')->on('trade_category');  ERROR


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
