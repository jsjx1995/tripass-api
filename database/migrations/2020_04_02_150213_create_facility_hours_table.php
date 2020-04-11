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
            $table->bigInteger('facility_id')->unsigned()->comment('facility_basicinfoのid');
            $table->time('mon_open')->nullable($value = true);
            $table->time('mon_close')->nullable($value = true);
            $table->time('tue_open')->nullable($value = true);
            $table->time('tue_close')->nullable($value = true);
            $table->time('wed_open')->nullable($value = true);
            $table->time('wed_close')->nullable($value = true);
            $table->time('thu_open')->nullable($value = true);
            $table->time('thu_close')->nullable($value = true);
            $table->time('fri_open')->nullable($value = true);
            $table->time('fri_close')->nullable($value = true);
            $table->time('sat_open')->nullable($value = true);
            $table->time('sat_close')->nullable($value = true);
            $table->time('sun_open')->nullable($value = true);
            $table->time('sun_close')->nullable($value = true);
            $table->longText('holiday')->nullable($value = true);
            $table->foreign('facility_id')->references('id')->on('facility_basicinfo');
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
