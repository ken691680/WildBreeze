<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('me01')->unique()->comment('email');
            $table->string('me02')->comment('password');
            $table->string('me03')->comment('中文姓名');
            $table->string('me04')->comment('姓別');
            $table->string('me05')->comment('手機號碼');
            $table->string('me06')->comment('縣市');
            $table->string('me07')->comment('鄉鎮市區');
            $table->string('me08')->comment('地址');
            $table->string('me09')->comment('是否願意收到電子報');
            $table->timestamp('joinTime')->comment('加入時間');
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
        Schema::dropIfExists('member');
    }
}
