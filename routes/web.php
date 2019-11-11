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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/adverts', 'AdvertsController@index')->name('adverts');
    
    Route::get('/components', 'ComponentsController@index')->name('components');
    Route::get('/components/new', 'ComponentsController@create');
    Route::post('/components/store', 'ComponentsController@store')->name('component.store');
    Route::get('/components/checked/{id}', 'ComponentsController@checked');
    
    Route::get('/types-of-components', 'TypesComponentsController@index')->name('types-of-components');
    Route::get('/types-of-components/checked/{id}', 'TypesComponentsController@checked');
});