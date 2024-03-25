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
        Schema::table('hotel_booking_payments', function (Blueprint $table) {
            $table->dropColumn('booking_id');
            $table->dropColumn('rate');
            $table->string('booking_code')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_booking_payments', function (Blueprint $table) {
            $table->integer('booking_id')->nullable();
            $table->dropColumn('booking_code');
            $table->string('rate')->nullable();
        });
    }
};
