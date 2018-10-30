<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_infos', function (Blueprint $table) {
            $table->string('id')->primary()->nullable();
            $table->string('tournament_id')->nullable();
            $table->string('season_id')->nullable();
            $table->string('round')->nullable();
            $table->string('scheduled')->nullable();
            $table->string('played')->nullable();
            $table->string('max_coverage_level')->nullable();
            $table->string('max_covered')->nullable();
            $table->string('live_coverage')->nullable();
            $table->string('betradar_data')->nullable();
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
        Schema::dropIfExists('tournament_infos');
    }
}
