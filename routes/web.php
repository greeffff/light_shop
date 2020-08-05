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



Auth::routes();
Route::get('/','IndexController@index')->name('index')->middleware('permission:general_page');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['Middleware'=>'auth','namespace'=>'Admin','prefix'=>'admin','as'=>'admin.'],function (){
   Route::get('/','AdminController@index')->name('index');

   Route::group(['namespace'=>'Checker','prefix'=>'checker','as'=>'checker.'],function(){
       Route::group(['prefix'=>'permissions','as'=>'permissions.'],function (){
           Route::get('/','PermissionController@index')->name('index');
           Route::post('/dtData','PermissionController@dtData')->name('dt-data');
           Route::post('/store','PermissionController@store')->name('store');
           Route::post('/update','PermissionController@update')->name('update');
           Route::post('/delete','PermissionController@delete')->name('delete');
       });
       Route::group(['prefix'=>'roles','as'=>'roles.'],function (){
           Route::get('/','RoleController@index')->name('index');
           Route::post('/dtData','RoleController@dtData')->name('dt-data');
           Route::post('/store','RoleController@store')->name('store');
           Route::get('/edit/{role}','RoleController@edit')->name('edit');
           Route::put('/update/{role}','RoleController@update')->name('update');
           Route::post('/delete','RoleController@delete')->name('delete');
       });
       Route::group(['prefix'=>'users','as'=>'users.'],function (){
           Route::get('/','UserController@index')->name('index');
           Route::post('/dtData','UserController@dtData')->name('dt-data');
           Route::post('/store','UserController@store')->name('store');
           Route::get('/edit/{user}','UserController@edit')->name('edit');
           Route::put('/update/{user}','UserController@update')->name('update');
           Route::get('/create','UserController@create')->name('create');
           Route::post('/delete','UserController@delete')->name('delete');
       });
    });
   Route::group(['prefix'=>'categories','as'=>'categories.'],function (){
      Route::get('/','CategoryController@index')->name('index');
      Route::post('/dtData','CategoryController@dtData')->name('dt-data');
       Route::post('/store','CategoryController@store')->name('store');
   });
   Route::group(['prefix'=>'select','as'=>'select.'],function (){
       Route::post('/permissions','AjaxController@permissions')->name('permissions');
       Route::post('/roles','AjaxController@roles')->name('roles');
       Route::post('/categories','AjaxController@categories')->name('categories');
   });
});
