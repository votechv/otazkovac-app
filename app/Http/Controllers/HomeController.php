<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function scheduled(){
        return view('page.scheduled');
    }
    public function profil(){
        return view('page.profile');
    }
    public function navod(){
        return view('page.navod');
    }

    public function dashboard(){
        return view('page.dashboard');
    }

    public function studyroom(){
        return view('page.studyroom');
    }

    public function setting(){
        return view('page.setting');
    }

}
