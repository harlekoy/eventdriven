<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wagers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sport_event_id');
            $table->string('wagerable_id');
            $table->string('wagerable_type');
            $table->string('bet_type');
            $table->string('total_wager_value');
            $table->string('odds');
            $table->string('selling_percentage');
            $table->string('selling_price');
            $table->string('status')->default('open');
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
        Schema::dropIfExists('wagers');
    }
}
