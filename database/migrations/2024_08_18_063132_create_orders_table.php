<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Use UUID as the primary key
            $table->uuid('user_id'); // Use UUID for user_id

            $table->decimal('total_amount', 8, 2); // Total amount with precision
            $table->string('status')->default('Pending'); // Default order status
            $table->text('shipping_address'); // Shipping address as text
            $table->string('payment_method'); // Payment method
            $table->string('first_name'); // First name of the customer
            $table->string('last_name')->nullable(); // Last name (nullable)
            $table->string('email'); // Customer's email
            $table->string('mobile_no'); // Customer's mobile number
            $table->string('address_line1'); // Address line 1
            $table->string('address_line2')->nullable(); // Address line 2 (nullable)
            $table->string('country'); // Country
            $table->string('city'); // City
            $table->string('state'); // State
            $table->string('zip_code'); // Zip code

            $table->timestamps(); // Timestamps for created_at and updated_at

            // Foreign key constraint for user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
