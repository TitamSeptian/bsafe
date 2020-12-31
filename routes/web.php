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

	Route::resource('/operator', "OperatorController");
	Route::get('/d/opr', "OperatorController@datatables")->name('operator.data');
});
