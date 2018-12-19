<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_events', function (Blueprint $table) {
            $table->string('id')->primary()->nullable();
            $table->string('image')->nullable();
            $table->string('liveodds')->nullable();
            $table->datetime('next_live_time')->nullable();
            $table->datetime('scheduled')->nullable();
            $table->string('name')->nullable();
            $table->boolean('start_time_tbd')->default(true);
            $table->string('status')->nullable();
            $table->string('sport_id')->nullable();
            $table->string('venue_id')->nullable();
            $table->string('tournament_id')->nullable();
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
        Schema::dropIfExists('sport_events');
    }
}
