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
            $table->string('employees_role_name')->comment('Role assigned to the employee');
            $table->text('employees_role_description')->comment('Description of the assigned position');
            $table->timestamps();
            $table->softDeletes();

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
