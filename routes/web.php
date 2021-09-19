<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'packagecontroller@index');
Route::get('/public', 'packagecontroller@public');
Route::get('/locked-package', 'packagecontroller@locked');
Route::get('/profil', 'homecontroller@profil');
Route::get('/scheduled', 'homecontroller@scheduled');
Route::get('/navod', 'homecontroller@navod');

Auth::routes();


Route::get('/package/{any?}', function(){
    return view('layouts.admin');
})->where('any', '.*')->middleware('auth');


Route::get('/home/{any?}', function(){
    return view('layouts.admin');
})->where('any', '.*')->middleware('auth');


