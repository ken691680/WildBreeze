<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->comment('email');
            $table->string('password')->comment('password');
            $table->string('name')->comment('中文姓名');
            $table->string('gender')->comment('姓別');
            $table->string('phone')->nullable()->comment('手機號碼');
            $table->string('city')->nullable()->comment('縣市');
            $table->string('township')->nullable()->comment('鄉鎮市區');
            $table->string('address')->nullable()->comment('地址');
            $table->string('new_latter')->nullable()->comment('是否願意收到電子報');
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
        Schema::dropIfExists('users');
    }
}
