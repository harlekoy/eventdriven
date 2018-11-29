<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('odds_change_id');
            $table->unsignedInteger('betradar_id')->nullable();
            $table->integer('status')->nullable();
            $table->unsignedInteger('favourite')->nullable();
            $table->string('specifiers')->nullable();
            $table->timestamps();

            $table->foreign('odds_change_id')
                ->references('id')->on('odds_changes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markets');
    }
}
