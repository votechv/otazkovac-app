<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 'user_id', 'emoji', 'count', 'time', 'days', 'updated_at', 'last'
      ];

    public function user(){
        return $this->belongsTo('App\User');
     }
    public function plantime(){
        return $this->hasmany('App\Plantime');
     }

}
