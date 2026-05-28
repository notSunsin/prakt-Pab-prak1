<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/heroes' , [HeroController::class, 'index'])->name('heroes');
Route::get ('/profile' , [ProfileController::class, 'index'])->name('profile');
