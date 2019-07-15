<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentsSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('students_subjects', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->bigInteger('student_code')->unsigned();
        $table->bigInteger('subject_code')->unsigned();
        $table->float('score');
        $table->foreign('subject_code')->references('id')->on('subjects')->onDelete('set null');
        $table->foreign('student_code')->references('id')->on('students')->onDelete('set null');;
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
        Schema::dropIfExists('students_subjects');

    }
}
