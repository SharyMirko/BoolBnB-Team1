<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        //Route::get('/', 'DashboardController@index')->name('dashboard');
        //Route::post('/slugger', 'DashboardController@slugger')->name('slugger');
        //Route::resource('/apartment', 'ApartmentController');
        //Route::resource('/categories', 'CategoryController');
    });

    
Route::get('/', 'HomeController@index')->name('LandingPage');

// MOMENTANEO DA MODIFICARE
Route::get('/show', 'Admin\ServiceController@index')->name('ShowPage');

Route::resource('/apartment', 'Admin\ApartmentController');



Route::get('{any?}', function () {
    return view('guests.landing');
})->where('any', '.*');
