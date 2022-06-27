<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
     
      Route::get('/', 'DashboardController@index')->name('dashboard');
      //Route::post('/slugger', 'DashboardController@slugger')->name('slugger');
      Route::resource('/apartments', 'ApartmentController');
      Route::resource('/messages', 'MessageController');
      Route::resource('/payments', 'PremiumFeatureController'); 
      Route::post('/checkout', 'PremiumFeatureController@checkout');
      Route::get('/statistics', 'ViewController@index');
      Route::resource('/statistics', 'ViewController');
      //Route::resource('/categories', 'CategoryController');
      
   });

Route::get('/', 'HomeController@index')->name('LandingPage');
Route::resource('/apartments', 'Admin\ApartmentController');
Route::resource('/messages', 'Admin\MessageController');


Route::get('/messages', 'Admin\MessageController@index')->name('messages');

Route::get('{any?}', function () {
   return view('guests.landing');
})->where('any', '.*');




/* Route::get('/payments', function(){
   $gateway = new Braintree\Gateway([
      'environment' => config('services.braintree.environment'),
      'merchantId' => config('services.braintree.merchantId'),
      'publicKey' => config('services.braintree.publicKey'),
      'privateKey' => config('services.braintree.privateKey')
  ]);
  $token = $gateway->ClientToken()->generate();
  return view('admin.payments.index', [
   'token' => $token
  ]);
});
Route::post('/checkout', function(Request $request) {

}); */