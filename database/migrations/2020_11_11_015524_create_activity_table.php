<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('负责人Id');
            $table->string('title')->nullable()->comment('活动标题');
            $table->string('content')->nullable()->comment('活动内容');
            $table->string('adress')->nullable()->comment('活动地址');
            $table->string('rule')->nullable()->comment('活动规则');
            $table->string('prize')->nullable()->comment('活动奖品');
            $table->date('start')->nullable()->comment('活动开始时间');
            $table->date('end')->nullable()->comment('活动结束时间');
            $table->integer('status')->default(0)->comment('0-审核中，1-通过审核待上架（未开始），2-上架中,3-下架（已结束）,4-删除');
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
        Schema::dropIfExists('activity');
    }
}
