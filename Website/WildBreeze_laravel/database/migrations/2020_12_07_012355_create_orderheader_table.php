<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_header', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('oh01')->comment('訂單編號');
            $table->string('oh02')->comment('處理進度狀態:處理進度狀態, 出貨中訂單, 取消訂, 貨件已簽收, 退貨訂單, 換貨訂單');
            $table->dateTime('oh03')->comment('訂購時間');
            $table->string('oh04')->comment('付款方式:從資料代碼捉');
            $table->string('oh05')->comment('付款狀態:系統讀取串接程式碼辨識是否付款成');
            $table->integer('oh06')->comment('訂單總金額');
            $table->string('oh07')->comment('中文全名, 訂購人資訊');
            $table->string('oh08')->comment('性別:男, 女');
            $table->string('oh09')->comment('手機號碼');
            $table->string('oh10')->comment('縣市');
            $table->string('oh11')->comment('鄉鎮市區');
            $table->string('oh12')->comment('郵遞區號');
            $table->string('oh13')->comment('地址');
            $table->string('oh14')->comment('會員暱稱');
            $table->string('oh15')->comment('電子郵件');
            $table->string('oh16')->comment('電子郵件');
            $table->string('oh17')->comment('密碼');
            $table->string('oh18')->comment('統一編號');
            $table->string('oh19')->comment('發票抬頭');
            $table->string('oh20')->comment('收件人資料性別:男,女,');
            $table->string('oh21')->comment('收件人資料:手機號碼');
            $table->string('oh22')->comment('收件人資料:送貨地址-縣市');
            $table->string('oh23')->comment('收件人資料:送貨地址-鄉鎮市區');
            $table->string('oh24')->comment('收件人資料:送貨地址-郵遞區號');
            $table->string('oh25')->comment('收件人資料:送貨地址-地址');
            $table->string('oh26')->comment('退貨狀態:無,退貨處理中,已退貨,已換貨,已退款');
            $table->text('oh27')->comment('退貨原因');
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
        Schema::dropIfExists('orderheader');
    }
}
