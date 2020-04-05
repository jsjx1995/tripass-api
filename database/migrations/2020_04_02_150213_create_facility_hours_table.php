<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('facility_id')->unsigned()->comment('facilitiesのid');
            $table->time('mon_open')->nullable();
            $table->time('mon_close')->nullable();
            $table->time('tue_open')->nullable();
            $table->time('tue_close')->nullable();
            $table->time('wed_open')->nullable();
            $table->time('wed_close')->nullable();
            $table->time('thu_open')->nullable();
            $table->time('thu_close')->nullable();
            $table->time('fri_open')->nullable();
            $table->time('fri_close')->nullable();
            $table->time('sat_open')->nullable();
            $table->time('sat_close')->nullable();
            $table->time('sun_open')->nullable();
            $table->time('sun_close')->nullable();
            $table->string('holiday')->nullable();
            $table->foreign('facility_id')->references('id')->on('facilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility_hours');
    }
}
