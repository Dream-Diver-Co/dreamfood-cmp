<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {

            $table->id();
            $table->uuid('user_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->decimal('total_price', 10, 2); // Add total_price column
            $table->boolean('is_deal')->default(false);
            $table->timestamps();


        });

        Schema::table('carts', function (Blueprint $table) {
            $table->uuid('user_id')->change();
        });
    }


    public function down()
    {
        Schema::dropIfExists('carts');

        Schema::table('carts', function (Blueprint $table) {
            $table->integer('user_id')->change();
        });
    }

}
