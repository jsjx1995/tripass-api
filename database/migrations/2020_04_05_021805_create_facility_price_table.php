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
            $table->unsignedInteger('price_adult');
            $table->unsignedInteger('price_adult_discounted');
            $table->unsignedInteger('price_child');
            $table->unsignedInteger('price_child_discounted');
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
        Schema::dropIfExists('facility_price');
    }
}
