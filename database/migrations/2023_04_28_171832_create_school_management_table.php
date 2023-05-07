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
        Schema::create('school_management', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->time('open_time');
            $table->time('close_time');
            $table->text('image')->nullable();
            $table->text('info');
            $table->text('top_students')->nullable();
            $table->text('achievements')->nullable();
            $table->text('gallery')->nullable();
            $table->text('fee_structure')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_management');
    }
};
