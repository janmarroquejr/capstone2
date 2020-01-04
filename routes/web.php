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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/menu', 'MenuItemController@show');



Route::middleware(['auth'])->group(function(){
	
	// Route::get('/booking/{id}', 'BookingController@show');
	
	Route::post('/booking/{id}', 'BookingController@store');

	Route::get('/filter/{id}', 'MenuItemController@displayByCategory');

	Route::post('/preorder/{id}', 'MenuItemController@preOrder');

	Route::post('/preorder/{id}/reserve', 'MenuItemController@displayPreOrders');

	Route::get('/add', 'MenuItemController@storePreOrder');

	Route::get('/removeitem/{id}', 'BookingController@removeItem');

	Route::post('/editaccount/{id}', 'UserController@update');

	Route::patch('/edituser/{id}', 'UserController@edit');
	
});

Route::middleware(['admin'], ['super_admin'])->group(function(){
	
	Route::get('/addmenuitems', 'MenuItemController@create');

	Route::get('/addmenuitems', 'MenuItemController@index');
	
	Route::post('/addtomenu', 'MenuItemController@store');

	Route::delete('/deleteitem/{menuItem}', 'MenuItemController@destroy');

	Route::post('/edit/{menuItem}/edit', 'MenuItemController@edit');

	Route::patch('/update/{menuItem}', 'MenuItemController@update');

	Route::get('/viewbookings', 'BookingController@index');

	Route::patch('/updatestatus/{id}', 'BookingController@changeStatus');

	Route::get('/cancelbooking/{id}', 'BookingController@complete');
});

Route::middleware(['super_admin'])->group(function(){
	
	Route::get('/users', 'UserController@index');
	
	Route::post('/deleteuser/{id}', 'UserController@destroy');
	
	Route::post('/restoreuser/{id}', 'UserController@restore');

	Route::get('/addmenuitems', 'MenuItemController@create');

	Route::get('/addmenuitems', 'MenuItemController@index');
	
	Route::post('/addtomenu', 'MenuItemController@store');

	Route::delete('/deleteitem/{menuItem}', 'MenuItemController@destroy');

	Route::post('/edit/{menuItem}/edit', 'MenuItemController@edit');

	Route::patch('/update/{menuItem}', 'MenuItemController@update');

	Route::get('/viewbookings', 'BookingController@index');

	Route::patch('/updatestatus/{id}', 'BookingController@changeStatus');

	Route::get('/cancelbooking/{id}', 'BookingController@complete');
	
	Route::get('/deactivated', 'UserController@deactivated');
	
});



