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

Route::get('/', 'DashboardController@index');

Auth::routes();


// USERS ROLES AND PERMISSIONS
Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');


// POSTS
//Route::get('/', 'PostController@index')->name('home');

Route::resource('posts', 'PostController');

//Route::get('/home', 'HomeController@index')->name('home');

// MENUS
Route::get('menus', 'MenusController@index')->name('menus');
