<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicnicSpotMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picnic_spot_message', function (Blueprint $table) {
            $table->bigIncrements('psm01');
            $table->string('psm02')->comment('留言主旨');
            $table->text('psm03')->comment('留言內容');
            $table->string('psm04')->default('否')->comment('是否刪除');
            $table->timestamp('lastTime')->comment('最後更新時間');
            $table->integer('Ps01')->comment('野遊勝地編號');
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
        Schema::dropIfExists('picnic_spot_message');
    }
}
