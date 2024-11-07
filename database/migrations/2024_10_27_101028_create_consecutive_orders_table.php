<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsecutiveOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('consecutive_orders', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->uuid('user_id'); // Change to UUID
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable(); // Optional
            $table->string('address')->nullable(); // Optional
            $table->date('order_date');
            // $table->dateTime('order_date')->change(); // Change to DATETIME
            $table->integer('total_order_days')->default(1);
            $table->boolean('gift_awarded')->default(false);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('consecutive_orders');
    }
}
