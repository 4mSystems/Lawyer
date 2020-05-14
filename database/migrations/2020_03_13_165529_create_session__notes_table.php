<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session__notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('note');
            $table->bigInteger('session_Id')->unsigned();
            $table->foreign('session_Id')->references('id')->on('sessions');
            $table->string('updated_by');
            $table->string('status')->default('لا');
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
        Schema::dropIfExists('session__notes');
    }
}
