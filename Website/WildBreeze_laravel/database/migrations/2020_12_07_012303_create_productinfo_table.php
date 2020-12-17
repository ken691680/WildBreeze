<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_info', function (Blueprint $table) {
            $table->bigIncrements('pi01');
            $table->string('pi02')->comment('商品名稱');
            $table->integer('pi03')->comment('網站-原價');
            $table->integer('pi04')->comment('網站-優惠價');
            $table->text('pi05')->comment('商品說明');
            $table->string('pi06')->default('否')->comment('是否為促銷商品');
            $table->string('pi07')->default('否')->comment('是否為推薦商品');
            $table->dateTime('pi08')->comment('上架時間');
            $table->dateTime('pi09')->comment('下架時間');
            $table->string('pi10')->comment('商品規格-材質');
            $table->string('pi11')->comment('商品規格-填充物');
            $table->string('pi12')->comment('商品規格-重量');
            $table->string('pi13')->comment('商品規格-顏色, 從資料代碼捉，多選並寫入多筆PKey資料以「,」區別');
            $table->string('pi14')->comment('商品規格-尺寸, 從資料代碼捉，多選並寫入多筆PKey資料以「,」區別');
            $table->text('pi15')->comment('注意事項');
            $table->text('pi16')->comment('照片01');
            $table->text('pi17')->comment('照片02');
            $table->text('pi18')->comment('照片03');
            $table->text('pi19')->comment('照片04');
            $table->text('pi20')->comment('照片05');
            $table->text('pi21')->comment('照片06');
            $table->text('pi22')->comment('照片07');
            $table->text('pi23')->comment('照片08');
            $table->text('pi24')->comment('照片09');
            $table->text('pi25')->comment('照片10');
            $table->integer('pi26')->comment('補貨底數, 應是安全庫存量前台會呈現”貨到請通知我”，並發信通知補貨人員');
            $table->integer('pi27')->comment('庫存量，一開始是0');
            $table->string('pi28')->comment('是否為熱門商品');
            $table->string('pr01')->comment('商品類別編號');
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
        Schema::dropIfExists('product_info');
    }
}
