<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('app');
});

Route::get('/todos','TodolistController@todos')->middleware('auth');
Route::get('/todo/{id}','TodolistController@delete')->middleware('auth');
Route::get('/search/{task}','TodolistController@search')->middleware('auth');
Route::put('/update/{id}','TodolistController@update')->middleware('auth');
Route::post('/create-todo','TodolistController@todo_create')->middleware('auth');

Route::post('/api/login','Auth\PassportController@login')->name('login');
Route::post('/api/register','Auth\PassportController@register');
Route::get('/api/logout','Auth\PassportController@logout');
Route::get('/{vue_capture?}',  function () {
    return view('app');
})->where('vue_capture', '[\/\w\.-]*');
