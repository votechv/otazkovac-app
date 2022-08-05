<?php

namespace App\Http\Controllers\API;

use App\Plantime;
use App\Question;
use App\User;
use App\Package;
use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlantimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return auth('api')->user()->plantime()->with('plan')->latest()->get();
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

            $plantimes = Plantime::create($request->all());
    
            return response()->json([
                'message' => 'plantime created',
                 'id' => $plantimes
            ], 201);

             }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plantime  $plantime
     * @return \Illuminate\Http\Response
     */
    public function show(Plantime $plantime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plantime  $plantime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plantime $plantime)
    {
        $request->validate([
            'last' => 'required',
        ]);
        if($plantime['user_id'] === auth('api')->user()->id){  
        $plantime->update(
            $request->all()
        );
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plantime  $plantime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantime $plantime)
    {
        if($plantime['user_id'] === auth('api')->user()->id){ 
            $plantime->delete();
        }
    }
}
