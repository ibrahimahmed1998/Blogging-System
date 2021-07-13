<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table)
        {
            $table->id();
            $table->string('body');
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');;

            $table->unsignedBigInteger('articles_id');
            $table->foreign('articles_id')->references('id')->on('articles')
            ->onDelete('cascade')->onUpdate('cascade');;
        });
    }

    public function down() {  Schema::dropIfExists('comments'); }
}
