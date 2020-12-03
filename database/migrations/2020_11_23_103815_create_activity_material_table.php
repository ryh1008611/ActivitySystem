<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_material', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('负责人Id');
            $table->integer('activity_id')->comment('活动Id');
            $table->integer('material_id')->comment('物资id');
            $table->integer('num')->comment('物资数量');
            $table->tinyInteger('apply_status')->default(0)->comment('租借状态,0-未审核，1-已发放，2-已归还');
            $table->integer('operater')->nullable()->comment('操作者');
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
        Schema::dropIfExists('activity_material');
    }
}
