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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('maximum_booking')->comment('Highest number of rooms one can book at a time');
            $table->string('base_currency');
            $table->timestamps();
        });

        $a = new \App\Models\Setting();
        $a->maximum_booking = 100;
        $a->base_currency = 'NGN';
        $a->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
