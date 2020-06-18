<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HostpitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital', function (Blueprint $table) {
            $table->id();
            $table->string("username")->unique();
            $table->string("password");
            $table->string("name");
            $table->string("address_location");
            $table->float("x_location");
            $table->float("y_location");

            $table->integer("free_slots_hight");
            $table->integer("free_slots_medium");
            $table->integer("free_slots_low");

            $table->integer("price_hight");
            $table->integer("price_medium");
            $table->integer("price_low");

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
        Schema::dropIfExists('hospital');
    }
}
