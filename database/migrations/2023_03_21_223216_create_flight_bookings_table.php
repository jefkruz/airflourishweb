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
        Schema::create('flight_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code');
            $table->integer('customer_id');
            $table->integer('airline_id');
            $table->integer('supplier_id')->nullable();
            $table->integer('staff_ticketer_id')->nullable();
            $table->integer('sales_person_id')->nullable();
            $table->integer('currency_id');
            $table->string('total');
            $table->string('destination');
            $table->string('travel_date');
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
        Schema::dropIfExists('flight_bookings');
    }
};
