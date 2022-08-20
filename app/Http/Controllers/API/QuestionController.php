<?php

namespace App\Http\Controllers\API;

use App\Question;
use App\User;
use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth()->user()->question;
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
            $questions = Question::create($request->all());
        
                return response()->json([
                    'message' => 'question created',
                    'id' => $questions
                ], 201);

            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        if($question['user_id'] === auth('api')->user()->id OR $question['user_id'] === 1){

            $question->load('package');
            return $question;
        }
        else {

            return 'Nemáte právo přistoupit k těmto datům.';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {

        
        if($question['user_id'] === auth('api')->user()->id){  
        $question->update(
            $request->all()
        );

    }

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {

        if($question['user_id'] === auth('api')->user()->id){  
   
        $question->delete();
        }
        
    }
}
