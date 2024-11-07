<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admincontacts', function (Blueprint $table) {
            $table->id();
            $table->text("map");
            $table->string("address")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admincontacts');
    }
};
