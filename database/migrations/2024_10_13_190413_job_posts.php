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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->integer('by_user');
            $table->string('role');
            $table->string('level');
            $table->text('description');
            $table->string('type');
            $table->integer('applicants');
            $table->integer('applicants_applied')->default('0');
            $table->integer('payment');
            $table->string('payment_day');
            $table->integer('views')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
