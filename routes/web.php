<?php

use App\User;
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
Route::fallback(function () {   //we can use fallback function if not route
    return view('error');
});
Route::get('/password', 'Admin\Owncontroller@password');
Route::get('/send', 'MailController@send');
Route::view('/test', 'backend.users.test');
Route::get('/', 'Admin\OwnController@index');
Route::post('/', 'Auth\Logincontroller@login');

//Route::view('/home','home')->middleware('auth');
Route::get('/logout', 'Auth\LoginController@logout');

//Route::view('/users/password/{id}/change','backend/users/password/change')->middleware('auth');
//Route::post('/users/password/{id}/change','Admin\UserController@change')->middleware('auth');;

Route::group(array('prefix' => 'backend', 'namespace' => 'Admin', 'middleware' => 'auth'), function () {

    // Route::get('index','OwnController@backend');

    Route::get('/users/index', 'UserController@index');
    Route::get('/user/ssd', 'UserController@pull');
    Route::get('/users/create', 'UserController@create');
    Route::post('/users/create', 'UserController@store');
    Route::get('/users/{id}/show', 'UserController@show');
    Route::get('/users/{id}/edit', 'UserController@edit');
    Route::post('/users/{id}/edit', 'UserController@update');
    Route::get('/users/{id}/delete', 'UserController@destroy');
    Route::get('/users/{id}/soft', 'UserController@soft');
    Route::get('/users/{id}/restore', 'UserController@restore');
    Route::view('/users/password/{id}/change', 'backend/users/password/change');
    Route::post('/users/password/{id}/change', 'UserController@change');

    Route::get('/roles/index', 'RoleController@index');
    Route::get('/role/ssd', 'RoleController@pull');
    Route::get('/roles/create', 'RoleController@create');
    Route::post('/roles/create', 'RoleController@store');
    Route::get('/roles/{id}/show', 'RoleController@show');
    Route::get('/roles/{id}/edit', 'RoleController@edit');
    Route::post('/roles/{id}/edit', 'RoleController@update');
    Route::get('/roles/{id}/delete', 'RoleController@destroy');
    Route::get('/roles/{id}/soft', 'RoleController@soft');
    Route::get('/roles/{id}/restore', 'RoleController@restore');

    Route::get('/permissions/index', 'PermissionController@index');
    Route::get('/permissions/ssd', 'PermissionController@pull');
    Route::get('/permissions/create', 'PermissionController@create');
    Route::post('/permissions/create', 'PermissionController@store');
    Route::get('/permissions/{id}/show', 'PermissionController@show');
    Route::get('/permissions/{id}/edit', 'PermissionController@edit');
    Route::post('/permissions/{id}/edit', 'PermissionController@update');
    Route::get('/permissions/{id}/delete', 'PermissionController@destroy');

    Route::get('/branches/index', 'BranchController@index');
    Route::get('/branches/ssd', 'BranchController@pull');
    Route::get('/branches/create', 'BranchController@create');
    Route::post('/branches/create', 'BranchController@store');
    Route::get('/branches/{id}/show', 'BranchController@show');
    Route::get('/branches/{id}/edit', 'BranchController@edit');
    Route::post('/branches/{id}/edit', 'BranchController@update');
    Route::get('/branches/{id}/delete', 'BranchController@destroy');


});

Route::group(array('prefix' => 'pages', 'namespace' => 'pages', 'middleware' => 'auth'), function () {
    Route::get('/companies/index', 'CompanyController@index');
    Route::get('/companies/ssd', 'CompanyController@pull');
    Route::get('/companies/create', 'CompanyController@create');
    Route::post('/companies/create', 'CompanyController@store');
    Route::get('/companies/{id}/show', 'CompanyController@show');
    Route::get('/companies/{id}/edit', 'CompanyController@edit');
    Route::post('/companies/{id}/edit', 'CompanyController@update');
    Route::get('/companies/{id}/delete', 'CompanyController@destroy');
});
