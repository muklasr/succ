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

Route::get('/', 'HomeController@index');
Route::get('/admin/succulent', 'SucculentController@index');
Route::post('/admin/succulent/add','SucculentController@store')->name('succulentAdd');
Route::get('/admin/succulent/edit/{id}','SucculentController@edit')->name('succulentEdit');
Route::post('/admin/succulent/update','SucculentController@update')->name('succulentUpdate');
Route::get('/admin/succulent/delete/{id}','SucculentController@destroy')->name('succulentDelete');

Route::get('/admin/family', 'FamilyController@index');
Route::post('/admin/family/add','FamilyController@store')->name('familyAdd');
Route::get('/admin/family/edit/{id}','FamilyController@edit')->name('familyEdit');
Route::post('/admin/family/update','FamilyController@update')->name('familyUpdate');
Route::get('/admin/family/delete/{id}','FamilyController@destroy')->name('familyDelete');

Route::get('/admin/type', 'TypeController@index');
Route::post('/admin/type/add','TypeController@store')->name('typeAdd');
Route::get('/admin/type/edit/{id}','TypeController@edit')->name('typeEdit');
Route::post('/admin/type/update','TypeController@update')->name('typeUpdate');
Route::get('/admin/type/delete/{id}','TypeController@destroy')->name('typeDelete');