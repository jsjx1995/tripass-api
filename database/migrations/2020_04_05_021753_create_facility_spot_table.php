<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitySpotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_spot', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('facility_id')->unsigned()->comment('facility_basicinfoのid');
            $table->double('facility_lat', 9, 6);
            $table->double('facility_lng', 9, 6);
            // $table->geometry('facility_point');
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
        Schema::dropIfExists('facility_spot');
    }
}
