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
            $table->unsignedBigInteger('sale_id')->comment();
            $table->string('employee_cancellation')->comment();
            $table->unsignedBigInteger('cancellation_status_id')->comment();
            $table->timestamp('cancellation_status_date')->nullable()->comment();
            $table->string('origin')->comment();
            $table->timestamp('origin_date')->nullable()->comment();
            $table->timestamps();
            $table->softDeletes();

            //Forein keys'

            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('cancellation_status_id')->references('id')->on('general_statuses');
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
