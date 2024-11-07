<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mychefs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the chef
            $table->string('image')->nullable(); // Image field (nullable)
            $table->text('description')->nullable(); // Description (nullable)
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mychefs'); // Drops the table if rolled back
    }
};
