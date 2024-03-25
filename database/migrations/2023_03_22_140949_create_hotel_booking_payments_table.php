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
        Schema::create('hotel_booking_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->integer('customer_id');
            $table->integer('currency_id');
            $table->string('rate');
            $table->string('amount_paid');
            $table->string('balance');
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
        Schema::dropIfExists('hotel_booking_payments');
    }
};
