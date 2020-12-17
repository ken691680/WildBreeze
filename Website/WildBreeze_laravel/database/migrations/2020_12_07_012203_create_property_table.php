<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->bigIncrements('pr01');
            $table->string('pr02')->comment('類別名稱');
            $table->string('pr03')->comment('層級');
            $table->string('pr04')->comment('上一層編號');
            $table->integer('pr05')->comment('排序，數字小優先');
            $table->string('ma01')->nullable()->comment('更新者帳號');
            $table->dateTime('lastTime')->comment('最後更新時間');
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
        Schema::dropIfExists('property');
    }
}
