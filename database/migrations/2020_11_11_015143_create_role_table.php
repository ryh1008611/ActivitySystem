<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('权限名称');
            $table->string('Role_Key')->nullable()->comment('权限值');
            $table->tinyInteger('permissions')->default(0)->comment('权限:1->管理员，2->老师，3->社团管理员,4->游客(活动报名)');
            $table->string('description')->nullable()->comment('权限描述');
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
        Schema::dropIfExists('role');
    }
}
