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
Route::get('home', function () {
    return view('front_end.home');
});
Route::get('admin/login','UserController@getloginAdmin');
Route::post('admin/login','UserController@postloginAdmin');
Route::get('admin/logout','UserController@getlogoutAdmin');


Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function()
{
  # code...
  Route::group(['prefix'=>'user'],function(){
    Route::get('list_user','UserController@getListUser');
    // add user
    Route::get('add_user','UserController@getAddUser');
    Route::post('add_user','UserController@postAddUser');
    // edit user
    Route::get('edit_user/{id}','UserController@getEditUser');
    Route::post('edit_user/{id}','UserController@postEditUser');
    //
    Route::get('delete/{id}','UserController@getDelete');
  });
});

//
// Route front-end
Route::get('login','UserController@getLogin');
Route::post('login','UserController@postLogin');
