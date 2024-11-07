<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            // $table->json('sizes')->nullable(); // Store sizes as JSON
            // $table->json('colors')->nullable(); // Store colors as JSON
            $table->string('image')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('old_price', 8, 2)->nullable();
            $table->text('sub_description')->nullable();
            $table->text('description')->nullable();
            $table->text('information')->nullable();
            $table->timestamps();
        });

        // 31
        Schema::table('products', function (Blueprint $table) {
            $table->string('status')->default('breakfast'); // Add 'status' column with default 'Regular'
            $table->string('status_1')->default('In Stock');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');

        // 31
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('status_1');
        });

    }
}
