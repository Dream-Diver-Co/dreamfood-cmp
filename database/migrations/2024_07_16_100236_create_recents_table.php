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
        Schema::create('recents', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("price");
            $table->string("old_price")->nullable();
            $table->text("subtitle")->nullable();
            $table->text("description")->nullable();
            $table->string("information");
            $table->text("image")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recents');
    }
};
