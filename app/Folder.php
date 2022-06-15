<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = [
        'emoji', 'user_id', 'name'
      ];
   
       public function user(){
          return $this->belongsTo('App\User');
       }
       public function package(){
          return $this->hasMany('App\Package');
       }
}