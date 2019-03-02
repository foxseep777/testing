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

Route::get('/', function () {
    return view('hello');
});

Route::get('/qq', function () {
    return view('welcome');
});

Route::post('/qq', function () {
    return view('welcome');
});

Route::get('/th', 'Hello@index');



Route::get('user/{name}', function ($name) {
    //
	return $name;
})->where('name', '[0-9]+');
//Route::view('/welcome', 'welcome');

//Route::redirect('/qq', '/th', 301);
 