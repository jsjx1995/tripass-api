<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_photo', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('facility_id')->unsigned()->comment('facility_basicinfoのid');
            $table->string('pic_path')->comment('施設の写真のパス');
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
        Schema::dropIfExists('facility_photo');
    }
}
