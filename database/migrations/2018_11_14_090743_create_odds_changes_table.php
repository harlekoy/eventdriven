<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOddsChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odds_changes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product')->nullable();
            $table->double('expected_totals')->nullable();
            $table->double('expected_supremacy')->nullable();
            $table->string('event_id')->nullable();
            $table->dateTime('timestamp')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->unsignedInteger('match_status')->nullable();
            $table->integer('betting_reason')->nullable();
            $table->integer('betting_status')->nullable();
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
        Schema::dropIfExists('odds_changes');
    }
}
