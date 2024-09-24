<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Index');

Route::get('/about', function () {
  return inertia('About');
});
