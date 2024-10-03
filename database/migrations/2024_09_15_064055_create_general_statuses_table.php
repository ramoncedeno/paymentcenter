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
        Schema::create('general_statuses', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('general_status_name')->comment('Name of the general state');
            $table->boolean('status_is_for_employees_table')->comment('');
            $table->boolean('status_is_for_customers_table')->comment('');
            $table->boolean('status_is_for_sales_table')->comment('');
            $table->boolean('status_is_for_cancellations_table')->comment('');
            $table->boolean('status_is_for_payments_employees_table')->comment('');
            $table->boolean('status_is_for_payments_supervisors_table')->comment('');


            $table->boolean('status_is_rate')->comment('Monthly or quarterly frequency');
            $table->text('description')->comment('Status description');
            $table->timestamps();// Add created_at and updated_at
            $table->softDeletes(); // Add deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_statuses');
    }

};
