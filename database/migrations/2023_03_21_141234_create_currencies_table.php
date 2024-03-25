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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('currency', 6);
            $table->string('exchange');
            $table->timestamps();
        });

        $a = new \App\Models\Currency();
        $a->name = 'US Dollar';
        $a->currency = 'USD';
        $a->exchange = 1;
        $a->save();

        $b = new \App\Models\Currency();
        $b->name = 'Nigerian Naira';
        $b->currency = 'NGN';
        $b->exchange = 750;
        $b->save();

        $b = new \App\Models\Currency();
        $b->name = 'Espees';
        $b->currency = 'Espees';
        $b->exchange = 1450;
        $b->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currencies');
    }
};
