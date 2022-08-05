<?php

namespace App\Http\Controllers\API;

use App\Plan;
use App\Plantime;
use App\User;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth()->user()->plan;
             
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

            $plans = Plan::create($request->all());
    
            return response()->json([
                'message' => 'plan created',
                 'id' => $plans
            ], 201);

             }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'count' => 'required',
        ]);
        if($plan['user_id'] === auth('api')->user()->id){  
        $plan->update(
            $request->all()
        );
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        if($plan['user_id'] === auth('api')->user()->id){ 
            $plan->delete();
        }
    }
}
