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

Route::get('/', 'PagesController@index');
Route::get('/posts/{uuid}', 'PagesController@show');
// Comment route
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::get('/admin/adm-login', function(){
    return view('admin/login');
});

Route::get('/admin/adm-register', function(){
    return view('admin/register');
});

Route::post('/admin/adm-login', 'UserController@login');
Route::post('/admin/adm-register', 'UserController@register');
Route::get('/logout', 'UserController@logout');
Route::get('/admin/adm-dashboard', 'UserController@dashboard');
Route::get('/admin/adm-profile', 'UserController@profile');
Route::get('/admin/adm-settings/{uuid}', 'UserController@settings');
Route::post('/user/settings/{id}', 'UserController@profileSettings');
Route::post('/user/password/{id}', 'UserController@password');
Route::post('/user/image/{id}', 'UserController@uploadImage');
Route::get('/admin/adm-user', 'UserController@index');
Route::get('/admin/adm-edit/user/{uuid}', 'UserController@userPage');
Route::post('/admin/user/adm-create', 'UserController@create');
Route::post('/admin/user/adm-author/{id}', 'UserController@makeAuthor');
Route::get('/admin/adm-edit/user/{uuid}', 'UserController@edit');
Route::post('/admin/user/adm-admin/{id}', 'UserController@makeAdmin');
Route::get('/admin/adm-delete/user/{id}', 'UserController@destroy');

Route::get('/admin/adm-post', 'PostController@index');
Route::post('/admin/adm-post', 'PostController@store');
Route::get('/admin/adm-publish/post/{uuid}', 'PostController@publish');
Route::get('/admin/adm-add/post', 'PostController@create');
Route::get('/admin/adm-edit/post/{uuid}', 'PostController@edit');
Route::post('/update/{id}', 'PostController@update');
Route::get('/admin/adm-delete/post/{id}', 'PostController@destroy');

Route::get('/admin/adm-category', 'CategoryController@index');
Route::post('/admin/adm-category', 'CategoryController@store');
Route::get('/admin/adm-delete/category/{id}', 'CategoryController@destroy');
