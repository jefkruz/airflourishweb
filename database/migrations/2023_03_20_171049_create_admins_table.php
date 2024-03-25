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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->enum('role', ['admin', 'hotel', 'flight']);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });

        $a = new \App\Models\Admin();
        $a->email = 'admin@airflourish.com';
        $a->name = 'Administrator';
        $a->password = bcrypt(1234);
        $a->role = 'admin';
        $a->save();

        $b = new \App\Models\Admin();
        $b->email = 'hotel@airflourish.com';
        $b->name = 'Hotel Personnel';
        $b->password = bcrypt(1234);
        $b->role = 'hotel';
        $b->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
