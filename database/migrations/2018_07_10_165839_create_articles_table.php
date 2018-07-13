<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('article_id');
            $table->string('user_login')->nullable(false);
            $table->string('user_ip')->nullable(false);
            $table->string('title')->nullable(false);
            $table->string('content')->nullable(false);
            $table->timestamps();
        });

        Schema::table('articles', function (Blueprint $table) {

            $table->foreign('user_login')->references('user_login')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
