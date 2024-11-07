<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->decimal('discount', 5, 2);
            $table->integer('frequency');
            $table->integer('total_use');
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deals');
    }
}
