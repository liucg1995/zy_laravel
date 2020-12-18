<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('wid')->default('0');
            $table->string('source')->nullable(true);
            $table->string('title');
            $table->string('author')->nullable(true);
            $table->string('intro')->nullable(true);
            $table->date('publish_time')->nullable(true);
            $table->integer('is_pub');
            $table->integer('view')->default('0');
            $table->string('image')->nullable(true);
            $table->string('image_id')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('news');
    }
}
