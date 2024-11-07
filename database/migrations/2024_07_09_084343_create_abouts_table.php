<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('subtitle')->nullable();
            $table->text('description');
            $table->text('image')->nullable();
            $table->text('behind')->nullable();
            $table->text('mission')->nullable();
            $table->text('service')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abouts');
    }
};
