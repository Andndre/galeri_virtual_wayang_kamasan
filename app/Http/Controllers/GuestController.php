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
        $pelukis = User::all()->where('is_admin', 0);
        return view('guest.pelukis-index', compact('pelukis'));
    }

    public function pelukisDetail($id) {
        $pelukis = User::find($id);
        return view('guest.pelukis-detail', compact('pelukis'));
    }

    public function pelukisAr() {
        return view('guest.pelukis-ar');
    }
}
