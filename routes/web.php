<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function   (){
    return view('home');
})->name('home');

Auth::routes();

Route::get('/pokemon', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
