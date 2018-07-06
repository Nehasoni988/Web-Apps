<?php


Route::get('/', function () 
{
    return view('welcome');
});
Route::get('/welcome','taskController@welcome1');
Route::get('/todohome','taskController@welcome');
Route::get('/todohome','taskController@show');
Route::get('/form','taskController@form');
Route::post('/todohome','taskController@store');
Route::delete('/show/{id}','taskController@delete');
Route::get('/todoTask/{todoTask}/edit','taskController@edit');
Route::PATCH('/update/{id}','taskController@update');
Route::post('/todohome/search','taskController@search');
Route::get('/todohome/new','taskController@new');
Route::get('/todohome/old','taskController@old');
Route::get('/todohome/recent','taskController@recent');
Route::get('/full/{id}','taskController@full');
Route::get('/todohome/bytitle','taskController@bytitle');
Route::get('/todohome/bydate','taskController@bydate');
Route::get('/todohome/help','taskController@help');
Route::get('/todohome/grid','taskController@grid');
Route::get('/todohome/clear','taskController@clear');
Route::resource('/todoTask','taskController');


