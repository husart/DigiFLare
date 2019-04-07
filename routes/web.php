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

Route::resource('contacts','ContactsController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contacts', 'ContactsController@index')->name('contacts');;
Route::get('/test', 'DigiFlare@test');

Route::post('/add_contact', 'ContactsController@create');
Route::post('/edit_contact', 'ContactsController@edit');
Route::post('/delete_contact', 'ContactsController@delete');
