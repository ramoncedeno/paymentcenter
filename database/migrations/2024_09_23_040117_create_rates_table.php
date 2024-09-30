<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->unsignedBigInteger('product_id')->comment('Product associated with the rate');
            $table->unsignedBigInteger('role_id')->comment('Role associated with the rate');
            $table->unsignedBigInteger('recurrence_status_id')->comment('Rate recurrence');
            $table->string('currency', 3)->comment('Currency code in USD or MXN');
            $table->string('rate_type')->comment('Type of rate');
            $table->bigInteger('goal')->comment('Sales or performance goal associated with the rate');
            $table->timestamp('effective_date')->nullable()->comment('From when the rate is applicable');
            $table->timestamps();
            $table->softDeletes();

            //foreign keys

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('role_id')->references('id')->on('employees_roles');
            $table->foreign('recurrence_status_id')->references('id')->on('general_statuses');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
