<?php

namespace App\Http\Controllers\API;

use App\Folder;
use App\Package;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Folder::latest('id')->get();
        return auth()->user()->folder()->latest()->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['user_id'] === auth('api')->user()->id){

            $folders = Folder::create($request->all());
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
        if($folder['user_id'] === auth('api')->user()->id OR $folder['user_id'] === 1){
            
            $folder->load(['package' => function ($query) {
                 $query->where('user_id', auth('api')->user()->id)->orwhere('user_id', 1);
                 
             }]);

             $folder->load(['question' => function ($query) {
                $query->where('user_id', auth('api')->user()->id)->orwhere('user_id', 1);
                
            }]);
             
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
        $request->validate([
            'name' => 'required',
            'emoji' => 'required',
        ]);
        if($folder['user_id'] === auth('api')->user()->id){  
        $folder->update(
            $request->all()
        );
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {
        if($folder['user_id'] === auth('api')->user()->id){ 
            $folder->delete();
        }
    }
}
