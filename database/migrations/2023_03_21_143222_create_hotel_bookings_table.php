<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code');
            $table->integer('programme_id');
            $table->integer('customer_id');
            $table->integer('hotel_id');
            $table->integer('bank_id');
            $table->integer('room_id');
            $table->string('check_in');
            $table->string('check_out');
            $table->string('rooms');
            $table->string('nights');
            $table->integer('currency_id');
            $table->string('rate');
            $table->string('total');
            $table->text('guest')->nullable();
            $table->enum('status', ['request', 'partial', 'full', 'closed'])->default('request');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_bookings');
    }
};
