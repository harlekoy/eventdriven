<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producers', function (Blueprint $table) {
            $table->string('id')->primary()->nullable();
            $table->string('slug')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('api_url')->nullable();
            $table->string('scope')->nullable();
            $table->unsignedInteger('stateful_recovery_window_in_minutes');
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
        Schema::dropIfExists('producers');
    }
}
