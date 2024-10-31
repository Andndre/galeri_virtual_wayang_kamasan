<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::group(['prefix' => '/'], function() {
    Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('home-page');
    Route::get('/daftar-pelukis', [App\Http\Controllers\GuestController::class, 'pelukisIndex'])->name('guest.pelukis.index');
    Route::get('/pelukis-detail/{id}', [App\Http\Controllers\GuestController::class, 'pelukisDetail'])->name('guest.pelukis.detail');
    Route::get('/pelukis-ar/{id}', [App\Http\Controllers\GuestController::class, 'pelukisAr'])->name('guest.pelukis-ar.index');
});

Route::get('/change-language/{lang}', function (string $lang) {
    if (!in_array($lang, ['en', 'id'])) {
        abort(400);
    }
    Session::put('locale', $lang);
    return redirect()->route('home-page');
})->name('change-language');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
    Route::group(['prefix' => 'pelukis'], function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'pelukis'])->name('pelukis.index');
        Route::get('/create', [App\Http\Controllers\AdminController::class, 'pelukisCreate'])->name('pelukis.create');
        Route::post('/store', [App\Http\Controllers\AdminController::class, 'pelukisStore'])->name('pelukis.store');
        Route::get('/edit/{id}', [App\Http\Controllers\AdminController::class, 'pelukisEdit'])->name('pelukis.edit');
        Route::put('/update/{id}', [App\Http\Controllers\AdminController::class, 'pelukisUpdate'])->name('pelukis.update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\AdminController::class, 'pelukisDestroy'])->name('pelukis.destroy');
    });
});

Route::group(['prefix' => 'pelukis'], function() {
    Route::get('/', [App\Http\Controllers\PelukisController::class, 'index'])->name('pelukis.home');
    Route::group(['prefix' => 'lukisan'], function () {
        Route::get('/', [App\Http\Controllers\PelukisController::class, 'lukisan'])->name('pelukis.lukisan.index');
        Route::get('/create', [App\Http\Controllers\PelukisController::class, 'lukisanCreate'])->name('pelukis.lukisan.create');
        Route::post('/store', [App\Http\Controllers\PelukisController::class, 'lukisanStore'])->name('pelukis.lukisan.store');
    });
    Route::group(['prefix' => 'lukisan-ar'], function () {
        Route::get('/', [App\Http\Controllers\PelukisController::class, 'lukisanAr'])->name('pelukis.lukisanAr.index');
        Route::get('/create', [App\Http\Controllers\PelukisController::class, 'lukisanArCreate'])->name('pelukis.lukisanAr.create');
        Route::post('/store', [App\Http\Controllers\PelukisController::class, 'lukisanArStore'])->name('pelukis.lukisanAr.store');
    });
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [App\Http\Controllers\PelukisController::class, 'profile'])->name('pelukis.profile.index');
        Route::put('/update', [App\Http\Controllers\PelukisController::class, 'profileUpdate'])->name('pelukis.profile.update');
    });
});
