<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantime extends Model
{

    protected $fillable = [
        'user_id', 'plan_id', 'last', 'time', 'created_at', 'updated_at'
    ];
 
    public function user(){
        return $this->belongsTo('App\User');
     }

    public function plan(){
        return $this->belongsTo('App\Plan');
     }
}
