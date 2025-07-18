<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListenersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listeners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fio');
            $table->string('email');
            $table->string('education_level');
            $table->string('faculty')->nullable(true);
            $table->string('group_name');
            $table->unsignedBigInteger('direction_id');
            $table->foreign('direction_id')->references('id')->on('directions');
            $table->string('phone');
            $table->string('image');
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
        Schema::dropIfExists('listeners');
    }
}
