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
        Schema::create('addmissions', function (Blueprint $table) {
            $table->id();
            $table->string('applied_for');
            $table->integer('applied_for_id');
            $table->unsignedBigInteger('user_id');
            $table->longText('student_info');
            $table->longText('residential_info');
            $table->longText('prev_school_info');
            $table->text('father_info');
            $table->text('mother_info');
            $table->text('sibiling_info');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addmissions');
    }
};
