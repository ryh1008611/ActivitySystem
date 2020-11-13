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
            $table->increments('id')->comment('主键ID');
            $table->string('username',12)->unique()->comment('用户名称');
            $table->string('password',80)->comment('密码');
            $table->string('name',12)->nullable()->comment('用户姓名');
            $table->string('phone',11)->nullable()->comment('电话');
            $table->string('email',25)->nullable()->comment('电子邮箱');
            $table->integer('classNum')->nullable()->comment('年级');
            $table->string('academy')->nullable()->comment('学院');
            $table->string('major')->nullable()->comment('专业');
            $table->text('last_token')->nullable()->comment('登陆时的token');
            $table->tinyInteger('status')->default(0)->comment('用户状态 -1代表已删除 0代表正常 1代表冻结');
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
