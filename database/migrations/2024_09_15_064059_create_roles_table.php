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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('workstation')->comment('');
            $table->unsignedBigInteger('trade_category_id')->comment('');
            $table->unsignedBigInteger('employee_category_id')->comment('');
            $table->timestamps();
            $table->softDeletes();

            //foreing keys
            $table->foreign('trade_category_id')->references('id')->on('trade_categories');
            $table->foreign('employee_category_id')->references('id')->on('employees_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
