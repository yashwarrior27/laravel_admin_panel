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
        Schema::create('student_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->integer('from_school_id');
            $table->integer('to_school_id');
            $table->enum('status',['pending','rejected','success']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_transfers');
    }
};
