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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->timestamps();
        });

        $arr = ['LOS-ABB (One Way)', 'LOS-KAN (One Way)', 'ABB-LOS (One Way)', 'LOS-BNI (One Way)', 'LOS-DUB-LOS (Return)'];
        foreach($arr as $a){
            $d = new \App\Models\Destination();
            $d->destination = $a;
            $d->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinations');
    }
};
