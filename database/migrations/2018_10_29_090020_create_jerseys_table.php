<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJerseysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jerseys', function (Blueprint $table) {
            $table->string('id')->primary()->nullable();
            $table->string('competitor_id')->nullable();
            $table->string('type')->nullable();
            $table->string('base')->nullable();
            $table->string('sleeve')->nullable();
            $table->string('number')->nullable();
            $table->string('squares')->nullable();
            $table->string('stripes')->nullable();
            $table->string('horizontal_stripes')->nullable();
            $table->string('split')->nullable();
            $table->string('shirt_type')->nullable();
            $table->string('sleeve_detail')->nullable();
            $table->json('betradar_data')->nullable();
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
        Schema::dropIfExists('jerseys');
    }
}
