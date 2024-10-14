<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('index');
})->name('home-page');

Route::get('/change-language/{lang}', function (string $lang) {
    if (!in_array($lang, ['en', 'id'])) {
        abort(400);
    }
    Session::put('locale', $lang);
    return redirect()->route('home-page');
})->name('change-language');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/try-login', [App\Http\Controllers\LoginController::class, 'login'])->name('login-post')->middleware('guest');
