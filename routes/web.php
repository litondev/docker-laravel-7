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
Route::get("/",function(){
	echo "Hallo Dunia a";
});

Route::get("/login","MainController@login");
Route::post("/login","MainController@signin");
Route::get("/logout","MainController@logout");

Route::get("/test","MainController@testIndex");
Route::post("/test","MainController@testCreate");
Route::get("/test/{test}","MainController@testDelete");