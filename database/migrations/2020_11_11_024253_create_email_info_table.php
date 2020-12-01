<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id');
            $table->string('launch')->nullable()->comment('发起的邮箱');
            $table->string('target')->nullable()->comment('目标的邮箱');
            $table->string('title')->nullable()->comment('邮箱发送的题目');
            $table->text('content')->nullable()->comment('邮箱发送内容');
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
        Schema::dropIfExists('email_info');
    }
}
