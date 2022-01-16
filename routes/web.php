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

Route::get('/', 'PostController@index')->name('index');
Route::get('/post/{post}', 'PostController@show')->name('post');
Route::post('posts/{post}/comment', 'PostController@comment')->name('post.comment');

Route::group(['middleware' => ['auth']], function() {
  Route::get('/user', 'UserController@index')->name('user.index');
  Route::get('/user/post/create', 'PostController@create')->name('user.post.create');
  Route::post('/user/post', 'PostController@store')->name('user.post.store');

  Route::get('/user/post/{post}', 'PostController@edit')->name('user.post.edit');
  Route::put('/user/post/{post}', 'PostController@update')->name('user.post.update');

  Route::get('/user/post/delete/{post}', 'PostController@destroy')->name('user.post.delete');

  Route::get('user/comments', 'UserController@comments')->name('user.comments');
Route::delete('user/comments/{comment}', 'CommentController@destroy')->name('user.comments.destroy');
});


Auth::routes();


