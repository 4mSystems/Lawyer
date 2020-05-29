<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('users',['yes','no'])->default('no');
            $table->enum('clients',['yes','no'])->default('no');
            $table->enum('addcases',['yes','no'])->default('no');
            $table->enum('search_case',['yes','no'])->default('no');
            $table->enum('mohdreen',['yes','no'])->default('no');
            $table->enum('daily_report',['yes','no'])->default('no');
            $table->enum('monthly_report',['yes','no'])->default('no');
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
        Schema::dropIfExists('permissions');
    }
}
