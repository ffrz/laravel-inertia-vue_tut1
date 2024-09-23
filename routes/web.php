<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

$user = [
  'username' => 'john',
  'fullname' => 'John Doe',
];
Route::inertia('/', 'Index', ['user' => $user]);

Route::get('/about', function () {
  return inertia('About');
});
