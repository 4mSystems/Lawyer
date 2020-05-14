<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Attachements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Attachements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img_Url');
            $table->string('img_Description');
            $table->bigInteger('case_Id')->unsigned();
            $table->foreign('case_Id')->references('id')->on('cases');;
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
        //
    }
}
