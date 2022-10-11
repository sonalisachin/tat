<?php

use Illuminate\Support\Facades\Route;

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


  
Route::get('/{slug}', 'HomeController@index');  
Route::get('/', 'PagesController@index');
Route::get('/index', 'PagesController@index')->name('pages.index');
Route::get('/create', 'PagesController@create')->name('pages.create');
Route::post('/store', 'PagesController@store')->name('pages.store');
Route::get('/destroy/{id}', 'PagesController@destroy')->name('pages.destroy');
Route::get('/show/{id}', 'PagesController@show')->name('pages.show');
Route::get('/edit/{id}', 'PagesController@edit')->name('pages.edit');
Route::put('/update/{id}', 'PagesController@update')->name('pages.update');
Route::delete('/destroy/{id}', 'PagesController@destroy')->name('pages.destroy');