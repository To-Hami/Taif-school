<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomMidTable extends Migration
{

    public function up()
    {
        Schema::create('classroom_mid', function (Blueprint $table) {
            $table->id();
            $table->string('Name_Class');
            $table->bigInteger('Grade_id')->unsigned();
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
        Schema::dropIfExists('classroom_mid');
    }
}
