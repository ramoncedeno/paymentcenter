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
        Schema::create('product', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('product_id',10)->comment('id assigned to the product by the sponsor');
            $table->string('product_name',255)->comment('code name assigned to the product');
            $table->decimal('pricing', 5, 2)->comment('product price');
            $table->timestamps();// Add created_at and updated_at
            $table->softDeletes();// Add created_at and updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
