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

Route::get('/', 'PackageController@index');
Route::get('/public-packages', 'PackageController@public');
Route::get('/locked-package', 'PackageController@locked');
Route::get('/profil', 'HomeController@profil');
Route::get('/scheduled', 'HomeController@scheduled');
Route::get('/studyroom', 'HomeController@studyroom');
Route::get('/setting', 'HomeController@scheduled');


Route::get('/404', 'PackageController@error');



Route::get('/public/{any?}', 'PackageController@public')->where('any', '.*');


Auth::routes();


Route::get('/package/{any?}', function(){
    return view('layouts.admin');
})->where('any', '.*')->middleware('auth');

Route::get('/folder/{any?}', function(){
    return view('layouts.admin');
})->where('any', '.*')->middleware('auth');

Route::get('/mixapp/{any?}', function(){
    return view('layouts.admin');
})->where('any', '.*')->middleware('auth');

Route::get('/error', function(){
    return view('layouts.admin');
})->middleware('auth');


Route::get('/home/{any?}', function(){
    return view('layouts.admin');
})->where('any', '.*')->middleware('auth');

Route::get('/navod', function(){
    return view('layouts.admin');
});
Route::get('/dashboard', function(){
    return view('layouts.admin');
});
Route::get('/checklist', function(){
    return view('layouts.admin');
});
Route::get('/edit-folders', function(){
    return view('layouts.admin');
});

Route::get('/folders', function(){
    return view('layouts.admin');
});

