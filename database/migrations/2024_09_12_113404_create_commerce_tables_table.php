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
        Schema::create('commerce_tables', function (Blueprint $table) {
            $table->id()->unsigned()->comment('Primary key, auto-incremental');
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
        Schema::dropIfExists('commerce_tables');
    }
};
