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
        Schema::create('trades_categories', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('trades_categories_category_name')->comment('Category assigned to the store A,B,C');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades_categories');
    }
};
