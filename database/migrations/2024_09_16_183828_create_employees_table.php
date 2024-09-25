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
        Schema::create('employees', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('employee_name')-> comment('Employee name');
            $table->string('employee_number')-> comment('Employee number');
            $table->string('employee_sunnel_user')->comment('');
            $table->unsignedBigInteger('status_employees')->comment('');
            $table->unsignedBigInteger('employee_category')->comment('category assigned to employees');
            $table->string('sunnel_user')->comment('Sunnel username');
            $table->unsignedBigInteger('status_employee')->comment('Different payment statuses');
            $table->timestamps();
            $table->softDeletes();

            //forein keys

            $table->foreign('status_employees')->references('id')->on('general_statuses');
            $table->foreign('employee_category')->references('id')->on('employees_categories');


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
