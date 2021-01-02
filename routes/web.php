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

Route::get('/', "AuthController@getLogin")->name("login");
Route::post('/logingin', "AuthController@postLogin")->name("post-login");

Route::middleware('auth')->group(function () {
	Route::get('/dashoard', "UniversalController@dashboard")->name("dashboard");

	Route::post('/logout', "AuthController@logout")->name("logout");

	// operator
	Route::resource('/operator', "OperatorController");
	Route::get('/d/opr', "OperatorController@datatables")->name('operator.data');

	// driver
	Route::resource('/driver', "DriverController");
	Route::get('/d/dvr', "DriverController@datatables")->name('driver.data');

	// material
	Route::resource('/material', "MaterialController");
	Route::get('/material/delete/{id}', "MaterialController@destroy")->name('material.delete');
	// Route::get('/d/mtr', "MaterialController@datatables")->name('material.data');
	
	// assignment
	Route::resource('/assignment', "AssignmentController");
	Route::get('/assignment/delete/{id}', "AssignmentController@destroy")->name('assignment.delete');

	// material-for-drivers
	Route::prefix('0/driver')->group(function () {
	    Route::get('/material', function () {
	        return "success";
	    })->name('driver.material.index');
	});

	
});