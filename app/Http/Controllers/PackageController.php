<?php

namespace App\Http\Controllers;

use App\Package;
use App\Question;
use App\User;
use App\Plan;
use App\Plantime;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index',[
            'packages' => Package::all(),
            'plans' => Plan::all(),
            'plantimes' => Plantime::all(),
        ]);
    }

    public function home()
    {
        return view('home',[
            'packages' => Package::all(),
            'users' => User::all(),
        ]);
    }

    public function public(){
        return view('public',[
            'packages' => Package::all(),
            'users' => User::all(),
        ]);
    }
    public function locked(){
        return view('locked',[
            'packages' => Package::all(),
            'users' => User::all(),
            'questions' => Question::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('questions.single',[
            'package' => $package
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
