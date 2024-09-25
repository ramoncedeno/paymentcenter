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
        Schema::create('cancellations', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('customer_id')->comment();
                $table->unsignedBigInteger('employee_id')->comment();
                $table->unsignedBigInteger('trade_id')->comment();
                $table->unsignedBigInteger('product_id')->comment();
                $table->unsignedBigInteger('product_status')->comment();
                $table->timestamp('cancellation_status_date')->nullable()->comment();
                $table->string('origin');
                $table->timestamps();
                $table->softDeletes();

            //Forein keys'

            // $table->foreign('customer_id')->references('id')->on('customers');
            // $table->foreign('employee_id')->references('id')->on('employees');
            // $table->foreign('trade_id')->references('id')->on('trades');
            // $table->foreign('product_id')->references('id')->on('products');
            // $table->foreign('product_status')->references('id')->on('general_statuses');




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cancellations');
    }
};
