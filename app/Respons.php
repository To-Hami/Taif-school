<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Respons extends Model
{
    use Notifiable;

    protected $guarded  = [];
    protected $table = 'respons';
}
