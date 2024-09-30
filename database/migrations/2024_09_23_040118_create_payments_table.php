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
        Schema::create('payments', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->unsignedBigInteger('status_sale_id')->comment('Status assigned in the payment process');//FK
            $table->unsignedBigInteger('status_cancellation_id')->comment('Cancellation status assigned in the process');//FK
            $table->string('origin')->comment('Name of the record related to which it belongs');
            $table->timestamp('origin_date')->nullable()->comment('Date related to the origin of the record');
            $table->timestamps();
            $table->softDeletes();

            //forein keys
            $table->foreign('status_sale_id')->references('id')->on('general_statuses');
            $table->foreign('status_cancellation_id')->references('id')->on('general_statuses');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
