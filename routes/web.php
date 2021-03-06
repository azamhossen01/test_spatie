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
// Route::resource('posts','PostController')->middleware('auth');

Route::get('user_management','PostController@user_management')->name('user_management');

Route::get('manage_role_permission','PostController@manage_role_permission')->name('manage_role_permission');

Route::get('posts','PostController@index')->name('posts.index');
Route::post('posts','PostController@store')->name('posts.store');
Route::get('posts/create','PostController@create')->name('posts.create')->middleware('permission:write post');
Route::get('posts/{post}','PostController@show')->name('posts.show');
Route::put('posts/{post}','PostController@update')->name('posts.update');
Route::delete('posts/{post}','PostController@destroy')->name('posts.destroy');
Route::get('posts/{post}/edit','PostController@edit')->name('posts.edit')->middleware('permission:edit post');
