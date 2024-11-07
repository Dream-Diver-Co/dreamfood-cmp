<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('type', ['percent', 'dollar', 'euro']);
            $table->decimal('discount_amount', 8, 2);
            $table->integer('total_use')->default(0);
            $table->integer('max_users')->default(1); // Max total users
            $table->integer('max_user_uses')->default(1); // Max uses per user
            $table->decimal('min_amount', 8, 2)->default(0.00); // Minimum order amount for the coupon to be applied
            $table->enum('status', ['active', 'inactive']);
            $table->timestamp('start_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
