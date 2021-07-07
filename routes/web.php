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

Route::get('/', function () {
    return view('welcome');
});
// Roles y permisos
Route::get('/administration','AdminController@index')->name('administration');
Route::group(['middleware' => ['permission:Enlistar Roles']], function () {
    Route::resource('/role','RoleAdminController');
});
Route::group(['middleware' => ['permission:Enlistar Usuarios']], function () {
    Route::resource('/useradmin','UserAdministrationController');
});
Route::group(['middleware' => ['permission:Enlistar Permisos']], function () {
    Route::resource('/permission','PermissionController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/start', 'StartController@index')->name('start');
Route::post('/vuelogin', 'Auth\LoginController@vuelogin');
