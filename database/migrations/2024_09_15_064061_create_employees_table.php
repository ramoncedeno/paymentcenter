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
            $table->string('employees_employee_name')-> comment('Employee name');
            $table->unsignedBigInteger('employees_role_id')->comment('Position assigned to the employee');
            $table->string('employees_employee_number')-> comment('Employee number');
            $table->string('employees_employee_sunnel_user')->comment('Sunnel system user');
            $table->unsignedBigInteger('employees_status_employee_id')->comment('Active or inactive status of the employee');
            $table->unsignedBigInteger('employees_employee_category_id')->comment('Category assigned to employees');
            $table->string('employees_sunnel_user')->comment('Sunnel username');
            $table->timestamps();
            $table->softDeletes();

            //forein keys
            $table->foreign('employees_role_id')->references('id')->on('employees_roles');
            $table->foreign('employees_status_employee_id')->references('id')->on('general_statuses');
            $table->foreign('employees_employee_category_id')->references('id')->on('employees_categories');


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
