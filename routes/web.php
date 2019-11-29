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

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']],  function () {

//Dashboard Route
Route::get('/', 'Admin\HomeController@index')->name('home');

//Profile Routes
Route::get('profile', ['uses' => 'Admin\ProfileController@profile', 'as' => 'admin.profile']);
Route::put('profile/update', ['uses' => 'Admin\ProfileController@profileUpdate', 'as' => 'admin.profile.update']);
Route::put('password/update', ['uses' => 'Admin\ProfileController@passwordUpdate', 'as' => 'admin.password.update']);

//Users Routes
Route::get('users', ['uses' => 'Admin\UserController@index', 'as' => 'admin.user']);
Route::get('user/create', ['uses' => 'Admin\UserController@create', 'as' => 'admin.user.create']);
Route::post('user/store', ['uses' => 'Admin\UserController@store', 'as' => 'admin.user.store']);
Route::get('user/edit/{id}', ['uses' => 'Admin\UserController@edit', 'as' => 'admin.user.edit']);
Route::put('user/update', ['uses' => 'Admin\UserController@update', 'as' => 'admin.user.update']);
Route::delete('user/delete/{id}', ['uses' => 'Admin\UserController@destroy', 'as' => 'admin.user.delete']);

//Roles Routes
Route::get('roles', ['uses' => 'Admin\RoleController@index', 'as' => 'admin.role']);
Route::get('role/create', ['uses' => 'Admin\RoleController@create', 'as' => 'admin.role.create']);
Route::post('role/store', ['uses' => 'Admin\RoleController@store', 'as' => 'admin.role.store']);
Route::get('role/edit/{id}', ['uses' => 'Admin\RoleController@edit', 'as' => 'admin.role.edit']);
Route::put('role/update', ['uses' => 'Admin\RoleController@update', 'as' => 'admin.role.update']);
Route::delete('role/delete/{id}', ['uses' => 'Admin\RoleController@destroy', 'as' => 'admin.role.delete']);

//Permissions Routes
Route::get('permissions', ['uses' => 'Admin\PermissionController@index', 'as' => 'admin.permission']);
Route::get('permission/create', ['uses' => 'Admin\PermissionController@create', 'as' => 'admin.permission.create']);
Route::post('permission/store', ['uses' => 'Admin\PermissionController@store', 'as' => 'admin.permission.store']);
Route::get('permission/edit/{id}', ['uses' => 'Admin\PermissionController@edit', 'as' => 'admin.permission.edit']);
Route::put('permission/update', ['uses' => 'Admin\PermissionController@update', 'as' => 'admin.permission.update']);
Route::delete('permission/delete/{id}', ['uses' => 'Admin\PermissionController@destroy', 'as' => 'admin.permission.delete']);

});
