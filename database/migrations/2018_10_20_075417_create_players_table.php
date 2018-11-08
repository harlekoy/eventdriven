<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->string('id')->primary()->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('type')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('country_code')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('jersey_number')->nullable();
            $table->string('gender')->nullable();
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
        Schema::dropIfExists('players');
    }
}
