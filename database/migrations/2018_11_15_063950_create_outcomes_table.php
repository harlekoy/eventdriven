<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('market_id');
            $table->unsignedInteger('betradar_id')->nullable();
            $table->float('odds')->nullable();
            $table->double('probabilities')->nullable();
            $table->boolean('active')->nullable();
            $table->timestamps();

            $table->foreign('market_id')
                ->references('id')->on('markets')
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
        Schema::dropIfExists('outcomes');
    }
}
