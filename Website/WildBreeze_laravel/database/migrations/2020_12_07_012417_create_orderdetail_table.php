<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('od01')->comment('訂單細項編號');
            $table->Integer('od02')->comment('數量');
            $table->Integer('od03')->comment('小計');
            $table->string('pi01')->comment('商品編號');
            $table->string('pi02')->comment('商品名稱');
            $table->integer('pi04')->comment('網站-優惠價');
            $table->string('pi13')->comment('商品規格-顏色');
            $table->string('pi14')->comment('商品規格-尺寸');
            $table->string('oh01')->comment('訂單單頭編號');
            $table->string('me01')->comment('會員帳號');
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
        Schema::dropIfExists('order_detail');
    }
}
