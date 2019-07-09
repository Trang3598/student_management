<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('class_code')->unsigned();
            $table->string('name',50);
            $table->tinyInteger('gender');
            $table->date('birthday');
            $table->string('image',190);
            $table->string('address',190);
            $table->foreign('class_code')->references('id')->on('classes');
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
        Schema::dropIfExists('students');
    }
}
