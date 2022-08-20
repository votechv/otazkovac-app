<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folderanalytic extends Model
{
   protected $fillable = [
        ['user_id', 'folder_id', 'count_folders', 'count_done_folders']
   ];    
}
