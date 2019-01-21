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

Route::group(['middleware' => ['auth','cabinet_user'],'prefix' => 'cabinet'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'User\UserController@show')->name('show_profile');
    Route::resource('/thread', 'Thread\ThreadController');
});
Route::get('/threads', 'Thread\ThreadController@forum')->middleware('auth');
Route::put('/thread-comment/{id}', 'Thread\ThreadController@addComment')->name('add_thread_comment')->middleware('auth');
Route::group(['middleware' => ['auth','admin_user'],'prefix' => 'admin'], function () {
    Route::get('/thread', 'User\UserController@admin')->name('admin');
    Route::delete('/delete/{id}', 'User\UserController@destroy')->name('admin_delete_thread');
});