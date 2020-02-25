<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'UserController')->name('users');
Route::get('teste', function(){ return view('teste'); });
