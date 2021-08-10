<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('app');
});

Route::get('/todos','TodolistController@todos');
Route::get('/todo/{id}','TodolistController@delete');
Route::post('/create-todo','TodolistController@todo_create');
