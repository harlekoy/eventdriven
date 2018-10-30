<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->string('id')->primary()->nullable();
            $table->string('name')->nullable();
            $table->unsignedInteger('capacity')->nullable();
            $table->string('city_name')->nullable();
            $table->string('country_code')->nullable();
            $table->string('map_coordinates')->nullable();
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
        Schema::dropIfExists('venues');
    }
}
