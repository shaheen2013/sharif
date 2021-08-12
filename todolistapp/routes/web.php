<?php

use Illuminate\Support\Facades\Route;




Route::middleware(['auth:api'])->group(function (){
    Route::get('/todos','TodolistController@todos');
    Route::get('/todo/{id}','TodolistController@delete');
    Route::get('/search/{task}','TodolistController@search');
    Route::put('/update/{id}','TodolistController@update');
    Route::post('/create-todo','TodolistController@todo_create');
    Route::get('/country-city-list','CountryCityController@index');
    Route::get('/logout','Auth\PassportController@logout');
    Route::get('/', function () {
        return view('app');
    });
});

Route::post('/login','Auth\PassportController@login')->name('login');
Route::post('/register','Auth\PassportController@register');

Route::get('/{vue_capture?}',  function () {
    return view('app');
})->where('vue_capture', '[\/\w\.-]*');
