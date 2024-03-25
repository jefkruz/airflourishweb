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
        Schema::create('flight_ticket_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('loyalty_point')->nullable();
            $table->timestamps();
        });

        $arr = ['Economy Class', 'Business Class', 'First Class'];
        foreach($arr as $i){
            $a = new \App\Models\FlightTicketType();
            $a->name = $i;
            $a->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_ticket_types');
    }
};
