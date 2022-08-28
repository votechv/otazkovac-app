<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



   class Package extends Model
   {
      protected $fillable = [
          'user_id', 'name', 'folder_id', 'slug'
      ];
   
       public function user(){
          return $this->belongsTo('App\User');
       }
       public function folder(){
         return $this->belongsTo('App\Folder');
      }
       public function question(){
          return $this->hasMany('App\Question');
       }
   }

