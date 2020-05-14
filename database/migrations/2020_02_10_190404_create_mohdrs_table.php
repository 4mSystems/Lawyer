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
            $table->string('session_Date');
            $table->string('mokel_Name');
            $table->string('khesm_Name');
            $table->string('notes');
            $table->string('case_number');
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
        Schema::dropIfExists('mohdrs');
    }
}
