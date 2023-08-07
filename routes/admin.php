<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all admin dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "auth" middleware group.
|
*/
Auth::routes([
    'verify'=>false,
    'register'=>false,
]);



Route::get('/', function () {
    return view('welcome');
});
