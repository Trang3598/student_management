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
            $table->bigInteger('class_code')->nullable()->unsigned();
            $table->string('name',50);
            $table->tinyInteger('gender');
            $table->date('birthday');
            $table->string('image',190);
            $table->string('address',190);
            $table->string('phone',50);
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('class_code')->references('id')->on('classes')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
