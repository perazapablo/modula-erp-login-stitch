<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', [SaludoController::class, 'index']);

Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', fn () => back());

Route::get('/registro', fn () => view('auth.register'))->name('register');
Route::post('/registro', fn () => back());

Route::get('/perfil', fn () => view('account.edit'))->name('profile.edit');
Route::patch('/perfil', fn () => back())->name('profile.update');