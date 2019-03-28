<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessibilityTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessibility_types', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->comment('バリアフリーの名称');
          $table->string('slug')->comment('バリアフリーのSlug名');
//      $table->integer('accessibility_order')->comment('SELECTする際の取得順');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessibility_types');
    }
}
