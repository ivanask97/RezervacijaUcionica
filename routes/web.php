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


Auth::routes();
Route::get('/ucionica/index','Ucionic\UcioniceController@index')->name('ucionic');
Route::get('/rezervacija/index','Rezervacija\RezervacijeController@index')->name('sverez');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/users/profesori','Admin\UsersController@ispisi')->name('prof');
Route::get('/rezervacija/profesori','Rezervacija\RezervacijeController@editvasa')->name('vasarez');
Route::namespace('Ucionic')->prefix('ucionica')->name('ucionica.')->middleware('can:manage-users')->group(function(){
    Route::resource('/ucionica', 'UcioniceController', ['except'=>(('show'))]);
  
 
});
Route::namespace('Rezervacija')->prefix('rezervacija')->name('rezervacija.')->middleware('can:manage-users')->group(function(){
    Route::resource('/rezervacija', 'RezervacijeController', ['except'=>(('show'))]);
  
 
});
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except'=>(('show'))]);
  
 
});
