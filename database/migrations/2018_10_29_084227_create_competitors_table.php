<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitors', function (Blueprint $table) {
            $table->string('id')->primary()->nullable();
            $table->string('name')->nullable();
            $table->string('abbreviation')->nullable();
            $table->string('qualifier')->nullable();
            $table->string('country_code')->nullable();
            $table->string('sport_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('venue_id')->nullable();
            $table->string('manager_id')->nullable();
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
        Schema::dropIfExists('competitors');
    }
}
