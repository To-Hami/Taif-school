<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatAttachmentsTable extends Migration
{

    public function up()
    {
        Schema::create('Attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 999);
            $table->unsignedBigInteger('attachment_id')->nullable();
            $table->unsignedBigInteger('Notes_id')->nullable();
            $table->unsignedBigInteger('Tameem_id')->nullable();
            $table->foreign('attachment_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('Notes_id')->references('id')->on('manegers')->onDelete('cascade');
            $table->foreign('Tameem_id')->references('id')->on('tameems')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        //
    }
}
