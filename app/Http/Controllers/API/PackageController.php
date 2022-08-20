<?php

namespace App\Http\Controllers\API;

use App\Package;
use App\User;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      return auth()->user()->package()->latest()->get();

     

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

        $packages = Package::create($request->all());

        

        return response()->json([
            'message' => 'package created',
             'id' => $packages
        ], 201);
    }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        if($package['user_id'] === auth('api')->user()->id OR $package['user_id'] === 1){
            
           $package->load(['question' => function ($query) {
                $query->where('user_id', auth('api')->user()->id)->orwhere('user_id', 1);
                
            }]);
            
            return $package;
            
        }
        return 'nothing';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {

      
        $request->validate([
            'name' => 'required',
        ]);
        if($package['user_id'] === auth('api')->user()->id){  
        $package->update(
            $request->all()
        );
    }

         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        if($package['user_id'] === auth('api')->user()->id){ 
        $package->delete();
        }

    }
}
