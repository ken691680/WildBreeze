<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicnicSpotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picnic_spot', function (Blueprint $table) {
            $table->bigIncrements('ps01');
            $table->string('ps02')->comment('標題');
            $table->text('ps03')->nullable()->comment('景點介紹');
            $table->text('ps04')->nullable()->comment('照片說明1');
            $table->text('ps05')->nullable()->comment('照片說明2');
            $table->text('ps06')->nullable()->comment('照片說明3');
            $table->text('ps07')->nullable()->comment('照片說明4');
            $table->text('ps08')->nullable()->comment('照片說明5');
            $table->text('ps09')->nullable()->comment('照片說明6');
            $table->text('ps10')->nullable()->comment('照片說明7');
            $table->text('ps11')->nullable()->comment('照片說明8');
            $table->text('ps12')->nullable()->comment('照片說明9');
            $table->text('ps13')->nullable()->comment('照片說明10');
            $table->text('ps14')->nullable()->comment('照片1');
            $table->text('ps15')->nullable()->comment('照片2');
            $table->text('ps16')->nullable()->comment('照片3');
            $table->text('ps17')->nullable()->comment('照片4');
            $table->text('ps18')->nullable()->comment('照片5');
            $table->text('ps19')->nullable()->comment('照片6');
            $table->text('ps20')->nullable()->comment('照片7');
            $table->text('ps21')->nullable()->comment('照片8');
            $table->text('ps22')->nullable()->comment('照片9');
            $table->text('ps23')->nullable()->comment('照片10');
            $table->integer('ps24')->default('0')->comment('觀看次數');
            $table->timestamp('lastTime')->comment('最後更新時間');
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
        Schema::dropIfExists('picnic_spot');
    }
}
