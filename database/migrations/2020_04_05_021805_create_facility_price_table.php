<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_price', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('facility_id')->unsigned()->comment('facility_basicinfoのid');
            $table->string('price_title');
            $table->unsignedInteger('price_adult');
            $table->unsignedInteger('price_adult_discounted');
            $table->unsignedInteger('price_child');
            $table->unsignedInteger('price_child_discounted');
            $table->longText('price_detail');
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
        Schema::dropIfExists('facility_price');
    }
}
