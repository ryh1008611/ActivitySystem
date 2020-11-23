<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id')->nullable()->comment('活动id');
            $table->tinyInteger('type')->default(2)->comment('类型,1-头像,2-活动');
            $table->string('OriginalName')->nullable()->comment('原文件名');
            $table->string('fileName')->nullable()->comment('文件名');
            $table->string('fileType')->nullable()->comment('文件类型');
            $table->string('url')->nullable()->comment('地址');
            $table->integer('operter')->comment('操作者id');
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
        Schema::dropIfExists('images');
    }
}
