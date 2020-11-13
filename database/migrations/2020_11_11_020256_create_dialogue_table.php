<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDialogueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dialogue', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('launch_id')->comment('发起者id');
            $table->integer('target_id')->comment('接收者id');
            $table->string('content')->comment('内容');
            $table->enum('status', ['0', '1'])->comment('0-未读，1-已读');
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
        Schema::dropIfExists('dialogue');
    }
}
