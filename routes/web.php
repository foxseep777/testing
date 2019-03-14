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



Route::get('/', 'Users@index');
Route::post('/adduser', 'Users@adduser');
Route::post('/addcompany', 'Companies@addcompany');
Route::get('/generate', 'Report@generateData');
Route::get('/report', 'Report@report');
Route::get('/reportAbusers', 'Report@reportListAbusers');
Route::get('/companies', 'Companies@index');
Route::get('/abusers', 'Report@index');


  