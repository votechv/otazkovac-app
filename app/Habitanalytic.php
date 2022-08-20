<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitanalytic extends Model
{
    protected $fillable = [
        'user_id', 'count_habits', 'count_done_habits', 'date'
    ];
}
