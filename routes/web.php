<?php

use App\Http\Controllers\PokedexController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/pokemon', [PokemonController::class, '__invoke'])->name('pokemon.index');

Auth::routes();

Route::get('/', PokedexController::class, '__invoke')->name('pokedex');

Route::resource('pokemon', PokemonController::class)->except('index');

