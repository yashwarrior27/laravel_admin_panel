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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('unique_id');
            $table->string('phone');
            $table->date('dob');
            $table->enum('gender',['male','female','other']);
            $table->text('password');
            $table->string('profile_image')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->string('email_otp')->nullable();
            $table->boolean('status')->default(1);
            $table->text('fcm_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
