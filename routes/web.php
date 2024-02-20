<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('home', ['title' => 'Vehiculos']);}) -> name('home');
Route::get('/marcas', function () {return view('home', ['title' => 'Marcas']);}) -> name('marcas');
Route::get('/modelos', function () {return view('home', ['title' => 'Modelos']);}) -> name('modelos');
