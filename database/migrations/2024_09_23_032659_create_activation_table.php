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
        Schema::create('activation', function (Blueprint $table) {
            $table->id()->comment('Primary key, auto-incremental');
            $table->string('card', 16)->comment('Card number');
            $table->string('cardholder_name', 255)->comment('Name of the cardholder');
            $table->timestamp('member_since')->nullable()->comment('Date since the member is active'); // Verificado  nullable para evitar errores
            $table->unsignedBigInteger('status_contract')->comment('Status of the contract');
            $table->unsignedBigInteger('status_account')->comment('Status of the account');
            $table->timestamp('sale_date')->nullable()->comment('Date of sale'); // Verificado como nullable para evitar errores
            $table->string('user', 255)->comment('User who handled the activation');
            $table->string('executive', 255)->comment('Sales executive involved in the sale');
            $table->string('store', 255)->comment('Store or commerce involved');
            $table->string('activacion_store_executive', 255)->comment('Store executive responsible for activation');
            $table->unsignedBigInteger('product_idasigned')->comment('ID of the assigned product');
            $table->string('producto_name', 255)->comment('Name of the product');
            $table->string('employee_number', 255)->comment('Employee number handling the activation');
            $table->string('activation_user', 255)->comment('User who activated the product');
            $table->timestamps();
            $table->softDeletes();

            //Forein keys
            $table->foreign('status_contract')->references('id')->on('general_status');
            $table->foreign('status_account')->references('id')->on('general_status');
            $table->foreign('product_idasigned')->references('id')->on('product');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activation');
    }
};
