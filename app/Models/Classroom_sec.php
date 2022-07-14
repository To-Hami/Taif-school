<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom_sec extends Model
{

    use HasTranslations;
    public $translatable = ['Name_Class'];


    protected $table = 'classroom_sec';
    public $timestamps = true;
    protected $fillable=['Name_class','Grade_id'];


    // علاقة بين الصفوف المراحل الدراسية لجلب اسم المرحلة في جدول الصفوف



    public function Grades()
    {
        return $this->belongsTo('App\Models\Grades\Grade', 'Grade_id');
    }



}
