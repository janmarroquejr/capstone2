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


Route::get('/menu', 'MenuItemController@show');



Route::middleware(['auth'])->group(function(){
	
	Route::get('/booking/{id}', 'BookingController@show');
	
	
});

Route::middleware(['admin'])->group(function(){
	Route::post('/booking', 'BookingController@store');
	
	Route::get('/addmenuitems', 'MenuItemController@create');

	Route::get('/addmenuitems', 'MenuItemController@index');
	
	Route::post('/addtomenu', 'MenuItemController@store');

	Route::get('/deleteitem/{menuItem}', 'MenuItemController@destroy');

	Route::post('/edit/{menuItem}/edit', 'MenuItemController@edit');

	Route::patch('/update/{menuItem}', 'MenuItemController@update');

	Route::get('/viewbookings', 'BookingController@index');

	Route::patch('/updatestatus/{id}', 'BookingController@changeStatus');
});




