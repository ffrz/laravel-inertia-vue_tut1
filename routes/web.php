<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Index')->name('home');

Route::get('/about', function () {
  return inertia('About');
})->name('about');

Route::get('/contact', function() {
  return inertia('Contact');
})->name('contact');
