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

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('backend.login');
Route::post('/login', 'Auth\LoginController@login')->name('backend.login');

Route::middleware(['auth:backend'])->group(function () {
    Route::get('/logout', 'Auth\LoginController@logout')->name('backend.logout');

    Route::get('/', 'HomeController@index')->name('backend.index');

    // Admin
    Route::get('administrators', 'AdministratorController@index')->name('backend.administrator.index');
    Route::get('administrator/create', 'AdministratorController@create')->name('backend.administrator.create');
    Route::post('administrator/store', 'AdministratorController@store')->name('backend.administrator.store');
    Route::get('administrator/{administrator}', 'AdministratorController@edit')->name('backend.administrator.edit');
    Route::patch('administrator/{administrator}', 'AdministratorController@update')->name('backend.administrator.update');
    Route::delete('administrator/{administrator}', 'AdministratorController@destroy')->name('backend.administrator.destroy');

    Route::get('users', 'UserController@index')->name('backend.user.index');
    Route::get('user/create', 'UserController@create')->name('backend.user.create');
    Route::post('user/store', 'UserController@store')->name('backend.user.store');
    Route::get('user/{user}', 'UserController@edit')->name('backend.user.edit');
    Route::patch('user/{user}', 'UserController@update')->name('backend.user.update');
    Route::delete('user/{user}', 'UserController@destroy')->name('backend.user.destroy');

    Route::get('addresses', 'AddressController@index')->name('backend.address.index');
    Route::get('address/create', 'AddressController@create')->name('backend.address.create');
    Route::post('address/store', 'AddressController@store')->name('backend.address.store');
    Route::get('address/{address}', 'AddressController@edit')->name('backend.address.edit');
    Route::patch('address/{address}', 'AddressController@update')->name('backend.address.update');
    Route::delete('address/{address}', 'AddressController@destroy')->name('backend.address.destroy');
});
