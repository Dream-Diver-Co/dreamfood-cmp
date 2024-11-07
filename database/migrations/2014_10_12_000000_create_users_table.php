<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // Use UUID as the primary key
            $table->uuid('id')->primary();

            // Basic user information
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // Additional fields
            $table->text('photo')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();

            // Role and status fields
            $table->enum('role', ['admin', 'vendor', 'user'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Vendor specific information
            $table->text('vendor_short_info')->nullable();

            // Authentication tokens and timestamps
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
