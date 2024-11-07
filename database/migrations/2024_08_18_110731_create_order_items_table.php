<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->uuid('order_id'); // Use UUID for order_id
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Link to the products table
            $table->integer('quantity'); // Quantity of the product ordered
            $table->decimal('price', 10, 2); // Price of the product at the time of order
            $table->string('size')->nullable(); // Size of the product, if applicable
            $table->string('color')->nullable(); // Color of the product, if applicable
            $table->decimal('total_price', 10, 2); // Total price for this item (quantity * price)
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint for order_id
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
