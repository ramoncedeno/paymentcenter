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
        Schema::create('employee', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('employee_name')-> comment('employee name');
            $table->string('employee_number')-> comment('employee number');
            $table->string('sunnel_user')->comment('sunnel username');
            $table->string('status_pay')->comment('different payment statuses [FK]');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
