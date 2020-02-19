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
Route::get('/test', 'PagesController@test');
Route::get('/posts/{uuid}', 'PagesController@show');

Route::get('/admin/adm-login', function(){
    return view('admin/login');
});

Route::get('/admin/adm-register', function(){
    return view('admin/register');
});
Route::post('/admin/adm-login', 'UserController@login');
Route::post('/admin/adm-register', 'UserController@register');

Route::get('/logout', 'UserController@logout');

Route::get('/admin/adm-dashboard', function(){
    if (Auth::guest()) {
        //is a guest so redirect
        return redirect('/admin/adm-login');
    }
    return view('admin/dashboard');
});
Route::get('/admin/adm-edit/post/{uuid}', 'PostController@edit');
Route::post('/update/{id}', 'PostController@update');
Route::get('/admin/adm-delete/post/{id}', 'PostController@destroy');
Route::get('/admin/adm-post', 'PostController@index');
Route::post('/admin/adm-post', 'PostController@store');

Route::get('/admin/adm-delete/category/{id}', 'CategoryController@destroy');
Route::get('/admin/adm-category', 'CategoryController@index');
Route::post('/admin/adm-category', 'CategoryController@store');