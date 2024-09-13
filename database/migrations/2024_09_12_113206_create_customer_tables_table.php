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

        //$table->string('',0)->comment(''); //Attributes in columns
        //  $table-> bigInteger ('id_vicidial',)->unsigned();   +  $table->foreign('id_vicidial')->references('id')->on('ventas_vicidials');

        Schema::create('customer_tables', function (Blueprint $table) {
            $table->id()->unsigned()->comment('Primary key, auto-incremental');
            $table->string('name',255)->comment('');
            $table->string('last_name',255)->comment('');
            $table->string('credit_card',16)->comment('');
            $table->string('',0)->comment('');
            $table->string('',0)->comment('');
            $table->string('created_at',255)->comment('date the record was created');
            $table->string('updated_at',255)->comment('date the record was modified');
            $table->string('deleted_at',255)->comment('date the record was deleted');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_tables');
    }
};
