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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addmenuitems', 'MenuItemController@create');

Route::get('/addmenuitems', 'MenuItemController@index');

Route::get('/menu', 'MenuItemController@show');

Route::get('/deleteitem/{menuItem}', 'MenuItemController@destroy');

Route::middleware(['auth'])->group(function(){
	Route::post('/addtomenu', 'MenuItemController@store');
});

Route::get('/testpage', function(){
	return view('test');
});


