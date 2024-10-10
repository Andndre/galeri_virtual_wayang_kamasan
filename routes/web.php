<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('index');
});

Route::get('/change-language/{lang}', function (Request $request, string $lang) {
    if (!in_array($lang, ['en', 'id'])) {
        abort(400);
    }
    Session::put('locale', $lang);
    return redirect()->back();
})->name('change-language');
