<?php

namespace App\Http\Controllers\API;

use App\Folder;
use App\Package;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FolderOfflineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        return Folder::all()->where('public', 1)->values(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        if($folder['public'] === 1){
            
            $folder->load(['package']);

             $folder['package']->load(['question']);
             
             return $folder;
             
         }
         return 'nothing';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
    
          
             
        if($folder['public'] === 1){
            
            $folder->load(['package']);

             $folder['package']->load(['question']);
             
             return $folder;
             
         }
         return 'nothing';
             
    

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder){ 
   
    }
}
