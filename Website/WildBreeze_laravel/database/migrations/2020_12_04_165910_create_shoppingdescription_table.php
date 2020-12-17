<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_description', function (Blueprint $table) {
            $table->bigIncrements('sd01');
            $table->string('sd02')->comment('標題');
            $table->text('sd03')->comment('內容');
            $table->string('sdc01')->comment('類別編號');
            $table->string('ma01')->comment('帳號');

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
        Schema::dropIfExists('shopping_description');
    }
}
