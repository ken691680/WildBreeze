<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberEvaluateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_evaluate', function (Blueprint $table) {
            $table->bigIncrements('mee01');
            $table->string('mee02')->comment('好評主旨');
            $table->text('mee03')->comment('好評內容');
            $table->string('mee04')->default('否')->comment('是否刪除:是，否');
            $table->string('mee05')->default('否')->comment('是否可登好評:是，否');
            $table->string('user_id')->comment('此為會員帳號');
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
        Schema::dropIfExists('member_evaluate');
    }
}
