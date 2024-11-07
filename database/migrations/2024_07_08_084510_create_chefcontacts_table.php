<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chefcontacts', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->text("subject")->nullable();
            $table->text("note")->nullable();
            $table->string('image')->nullable();
            $table->string("address")->nullable();
            $table->date("date")->nullable();
            $table->time("time")->nullable();
            $table->string("event_name")->nullable();
            $table->string("chef_name")->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chefcontacts');
    }
};
