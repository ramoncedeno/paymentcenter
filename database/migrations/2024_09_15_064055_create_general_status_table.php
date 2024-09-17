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
        Schema::create('general_status', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('general_status_name', 255)->comment('Name of the general state');
            $table->boolean('status_is_account')->comment('Indicates true or false in the table of the same name');
            $table->boolean('status_is_contract')->comment('Indicates true or false in the table of the same name');
            $table->boolean('status_is_pay')->comment('Indicates true or false in the table of the same name');
            $table->boolean('status_is_sale')->comment('Indicates true or false in the table of the same name');
            $table->boolean('status_is_cancellation')->comment('Indicates true or false in the table of the same name');
            $table->text('description')->comment('status description');
            $table->timestamps();// Add created_at and updated_at
            $table->softDeletes(); // Add deleted_at for logical deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_status');
    }

};
