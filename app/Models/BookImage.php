<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    protected $table = 'book_images';
    protected $guarded = [];
    protected $casts=[
        'images' => 'array'
    ];



    public function book(){
        return $this->belongsTo(Book::class,'images_id');
    }
}
