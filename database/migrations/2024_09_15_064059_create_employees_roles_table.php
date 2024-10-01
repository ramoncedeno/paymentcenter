<?php

use Egulias\EmailValidator\Parser\Comment;
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
        Schema::create('employees_roles', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('role_name')->comment('Role assigned to the employee');
            $table->unsignedBigInteger('trade_category_id')->comment('Category assigned to trade');
            $table->unsignedBigInteger('employee_category_id')->comment('Category assigned to the employee');
            $table->text('Description')->comment('Description of the assigned position');
            $table->timestamps();
            $table->softDeletes();

            //foreing keys
            $table->foreign('trade_category_id')->references('id')->on('trades_categories');
            $table->foreign('employee_category_id')->references('id')->on('employees_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_roles');
    }
};
