<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



   class Package extends Model
   {
      protected $fillable = [
        'text', 'user_id', 'name'
      ];
   
       public function user(){
          return $this->belongsTo('App\User');
       }
       public function question(){
          return $this->hasMany('App\Question');
       }
   }

