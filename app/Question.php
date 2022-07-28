<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'text', 'user_id', 'package_id', 'folder_id'
      ];

    public function user(){
        return $this->belongsTo('App\User');
     }
     public function package(){
        return $this->belongsTo('App\Package');
     }
     public function folder(){
      return $this->belongsTo('App\Folder');
   }
 
    
}


