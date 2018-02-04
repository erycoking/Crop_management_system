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

Route::group(['middleware'=>['web']], function(){
	Route::get('/', function () {
	    return view('welcome');
	})->name('home');
	Route::resource('crop', 'CropController');
	Route::resource('disease', 'DiseaseController');
	Route::get('/delete/{id}', 'CropController@delete')->name('delete');
	Route::post('/search', 'CropController@search')->name('search');
});
