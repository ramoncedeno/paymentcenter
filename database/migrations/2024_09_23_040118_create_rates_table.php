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
            $table->unsignedBigInteger('rates_product_id')->comment('Product associated with the rate');
            $table->unsignedBigInteger('rates_role_id')->comment('Role associated with the rate');
            $table->unsignedBigInteger('rates_trade_category_id')->comment('');
            $table->unsignedBigInteger('rates_temporality_status_id')->comment('Rate recurrence');
            $table->bigInteger('rates_unit_price')->nullable()->comment('Unit price');
            $table->string('rates_currency', 3)->comment('Currency code in USD or MXN');
            $table->bigInteger('rates_goal')->comment('Sales or performance goal associated with the rate');
            $table->timestamp('rates_effective_date')->nullable()->comment('From when the rate is applicable');
            $table->timestamps();
            $table->softDeletes();

            //foreign keys

            $table->foreign('rates_product_id')->references('id')->on('products');
            $table->foreign('rates_role_id')->references('id')->on('employees_roles');
            $table->foreign('rates_temporality_status_id')->references('id')->on('temporalities');
            $table->foreign('rates_trade_category_id')->references('id')->on('trades_categories');


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
