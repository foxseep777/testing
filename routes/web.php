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

Auth::routes();

Route::get('/', 'Users@index')->middleware('auth');
Route::post('/adduser', 'Users@adduser')->middleware('auth');
Route::post('/addcompany', 'Companies@addcompany')->middleware('auth');
Route::get('/generate', 'Report@generateData')->middleware('auth');
Route::get('/report', 'Report@report')->middleware('auth');
Route::get('/reportAbusers', 'Report@reportListAbusers')->middleware('auth');
Route::get('/companies', 'Companies@index')->middleware('auth');
Route::get('/abusers', 'Report@index')->middleware('auth');

  

Route::resource('companies', 'CompanyController')->middleware('auth');







Route::resource('companies', 'CompanyController');