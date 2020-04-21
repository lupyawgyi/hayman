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
//Route::get('/autocomplete', 'Admin\OwnController@index');
//Route::post('/autocomplete/fetch', 'Admin\OwnController@fetch')->name('autocomplete.fetch');

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

    Route::get('/dropDowns/regions/index', 'RegionController@index');
    Route::get('/regions/ssd', 'RegionController@pull');
    Route::get('/dropDowns/regions/create', 'RegionController@create');
    Route::post('/dropDowns/regions/create', 'RegionController@store');
    Route::get('/dropDowns/regions/{id}/show', 'RegionController@show');
    Route::get('/dropDowns/regions/{id}/edit', 'RegionController@edit');
    Route::post('/dropDowns/regions/{id}/edit', 'RegionController@update');
    Route::get('/dropDowns/regions/{id}/delete', 'RegionController@destroy');

    Route::get('/dropDowns/positions/index', 'PositionController@index');
    Route::get('/positions/ssd', 'PositionController@pull');
    Route::get('/dropDowns/positions/create', 'PositionController@create');
    Route::post('/dropDowns/positions/create', 'PositionController@store');
    Route::get('/dropDowns/positions/{id}/show', 'PositionController@show');
    Route::get('/dropDowns/positions/{id}/edit', 'PositionController@edit');
    Route::post('/dropDowns/positions/{id}/edit', 'PositionController@update');
    Route::get('/dropDowns/positions/{id}/delete', 'PositionController@destroy');

    Route::get('/dropDowns/phones/index', 'PhoneController@index');
    Route::get('/phones/ssd', 'PhoneController@pull');
    Route::get('/dropDowns/phones/create', 'PhoneController@create');
    Route::post('/dropDowns/phones/create', 'PhoneController@store');
    Route::get('/dropDowns/phones/{id}/show', 'PhoneController@show');
    Route::get('/dropDowns/phones/{id}/edit', 'PhoneController@edit');
    Route::post('/dropDowns/phones/{id}/edit', 'PhoneController@update');
    Route::get('/dropDowns/phones/{id}/delete', 'PhoneController@destroy');

    Route::get('/staff/index', 'StaffController@index');
    Route::get('/staff/ssd', 'StaffController@pull');
    Route::get('/staff/create', 'StaffController@create');
    Route::post('/staff/create', 'StaffController@store');
    Route::get('/staff/{id}/show', 'StaffController@show');
    Route::get('/staff/{id}/edit', 'StaffController@edit');
    Route::post('/staff/{id}/edit', 'StaffController@update');
    Route::get('/staff/{id}/delete', 'StaffController@destroy');

    Route::get('/dropDowns/computers/index', 'ComputerController@index');
    Route::get('/computers/ssd', 'ComputerController@pull');
    Route::get('/dropDowns/computers/create', 'ComputerController@create');
    Route::post('/dropDowns/computers/create', 'ComputerController@store');
    Route::get('/dropDowns/computers/{id}/show', 'ComputerController@show');
    Route::get('/dropDowns/computers/{id}/edit', 'ComputerController@edit');
    Route::post('/dropDowns/computers/{id}/edit', 'ComputerController@update');
    Route::get('/dropDowns/computers/{id}/delete', 'ComputerController@destroy');

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
