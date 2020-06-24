<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMohdrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mohdrs', function (Blueprint $table) {
            $table->bigIncrements('moh_Id');
            $table->string('court_mohdareen');
            $table->string('paper_type');
            $table->string('deliver_data');
            $table->string('paper_Number');
            $table->date('session_Date');
            $table->string('mokel_Name');
            $table->string('khesm_Name');
            $table->string('notes')->nullable();
            $table->bigInteger('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->string('case_number');
            $table->string('status')->default('No');
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
        Schema::dropIfExists('mohdrs');
    }
}
