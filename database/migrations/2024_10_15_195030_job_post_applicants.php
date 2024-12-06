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
        Schema::create('job_post_applicants', function (Blueprint $table) {
            $table->id();
            $table->string('for_notification');
            $table->string('for_job_post');
            $table->integer('for_user');
            $table->string("name");
            $table->string("email");
            $table->string("resume");
            $table->text("cover_letter");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_post_applicants');
    }
};
