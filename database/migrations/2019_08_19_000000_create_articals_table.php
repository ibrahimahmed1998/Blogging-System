<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticalsTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('sub_title',50);
            $table->text('body');
            $table->integer('category');    // scinece = 1 , history = 2 , tech = 3
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');;
    });}

    public function down() {   Schema::dropIfExists('failed_jobs'); }
}
