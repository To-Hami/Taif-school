<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{

    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('manager_name')->nullable();
            $table->string('manager_phone')->nullable();
            $table->string('manager_email')->nullable();
            $table->string('number')->nullable();
            $table->string('history')->nullable();
            $table->string('direct')->nullable();
            $table->string('region')->nullable();
            $table->string('grade')->nullable();
            $table->string('location')->nullable();
            $table->string('attachment_ershad')->nullable();
            $table->string('attachment_slook')->nullable();
            $table->string('adds')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('history');
    }
}
