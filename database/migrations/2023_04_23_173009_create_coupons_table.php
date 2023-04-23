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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code')->uppercase()->unique();
            $table->text('coupon_details');
            $table->date('valid_from');
            $table->date('valid_to');
            $table->enum('discount_type',['P','F']);
            $table->integer('max_reedem')->default(0);
            $table->integer('max_user')->default(0);
            $table->integer('max_discount')->default(0);
            $table->float('amount');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
