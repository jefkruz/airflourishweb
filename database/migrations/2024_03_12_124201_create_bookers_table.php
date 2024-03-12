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
        Schema::create('bookers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('referral_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('dob')->nullable();
            $table->string('city')->nullable();
            $table->string('country');
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
        Schema::dropIfExists('bookers');
    }
};
