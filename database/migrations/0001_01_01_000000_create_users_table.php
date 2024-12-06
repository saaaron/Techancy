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
            $table->id();
            $table->string('profile_photo')->default('profile_photos/default.png');
            $table->string('name');
            $table->string('email')->unique();
            $table->text('bio');
            $table->string('website');
            $table->string('location');
            $table->enum('currency', ['NGN', 'USD', 'POUND', 'EURO', 'YEN'])->default('NGN');
            $table->enum('email_verified', ['yes','no'])->default('no');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('email_verification_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('email_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('delete_acct_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('email_verification_tokens');
        Schema::dropIfExists('email_reset_tokens');
        Schema::dropIfExists('delete_acct_tokens');
        Schema::dropIfExists('sessions');
    }
};
