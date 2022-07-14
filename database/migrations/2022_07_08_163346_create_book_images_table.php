<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookImagesTable extends Migration
{

    public function up()
    {
        Schema::create('book_images', function (Blueprint $table) {
            $table->id();
            $table->string('images');
            $table->bigInteger('images_id')->unsigned();

            $table->timestamps();
            $table->foreign('images_id')->references('id')->on('books')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('program_images');
    }
}
