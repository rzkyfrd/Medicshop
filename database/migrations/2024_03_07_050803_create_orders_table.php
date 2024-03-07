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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->Biginteger('user_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('contact');
            $table->string('status');
            $table->string('payment_method');
            $table->string('bank')->nullable();
            $table->string('courier')->nullable();
            $table->timestamps();
        });
        Schema::table('orders', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
