<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invetation_num');
            $table->string('circle_num');
            $table->string('court');
            $table->string('first_session_date');
            $table->string('inventation_type');
            $table->bigInteger('to_whome')->unsigned();
            $table->foreign('to_whome')->references('id')->on('categories');
            $table->string('descion')->default('not yet');
            $table->string('month')->default('2');;
            $table->string('year')->default('2');;
            $table->string('one_session_note');
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
        Schema::dropIfExists('cases');
    }
}
