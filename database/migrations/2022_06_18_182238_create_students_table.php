<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{

    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('statues');
            $table->string('porn_address')->nullable();
            $table->string('Date_Birth')->nullable();;
            $table->string('date_end_id')->nullable();
            $table->string('nationality')->nullable();
            $table->string('father')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('neighsbor')->nullable();
            $table->string('neighbor_address')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('Id_Number')->nullable();
            $table->bigInteger('Grade_id')->unsigned()->nullable();;
            $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade');
            $table->bigInteger('blood_id')->unsigned()->nullable();
            $table->foreign('blood_id')->references('id')->on('type__bloods')->onDelete('cascade');
            $table->bigInteger('Classroom_id')->unsigned()->nullable();
            $table->bigInteger('sub_classroom_id')->unsigned()->nullable();
            $table->foreign('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade');
            $table->bigInteger('level_id')->unsigned()->nullable();;
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->string('academic_year')->nullable();;
            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('students');
    }
}
