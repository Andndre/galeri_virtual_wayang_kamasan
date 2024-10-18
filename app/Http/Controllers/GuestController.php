<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest.home');
    }

    public function pelukisIndex() {
        $daftarPelukis = User::all()->where('is_admin', 0);
        return view('guest.pelukis-index', compact('daftarPelukis'));
    }
}
