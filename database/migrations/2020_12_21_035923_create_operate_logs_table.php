<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operate_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('操作用户ID');
            $table->string('username',30)->comment('操作用户');
            $table->string('uri')->comment('操作地址');
            $table->text('parameter')->nullable()->comment('参数');
            $table->string('method')->comment('请求方式：GET、POST、PUT、DELETE、HEAD');
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
        Schema::dropIfExists('operate_logs');
    }
}
