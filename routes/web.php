<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Index')->name('home');
Route::inertia('/register', 'Auth/Register')->name('register');
