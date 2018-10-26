<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('alpha_2')->nullable();
            $table->string('alpha_3')->nullable();
            $table->string('country_code')->nullable();
            $table->string('iso_3166_2')->nullable();
            $table->string('region')->nullable();
            $table->string('sub_region')->nullable();
            $table->string('intermediate_region')->nullable();
            $table->string('region_code')->nullable();
            $table->string('sub_region_code')->nullable();
            $table->string('intermediate_region_code')->nullable();
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
        Schema::dropIfExists('countries');
    }
}
