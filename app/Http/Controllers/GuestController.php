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
        if (is_null($pelukis)) {
            abort(404);
        }
        return view('guest.pelukis-index', compact('pelukis'));
    }

    public function pelukisDetail($id) {
        $pelukis = User::find($id)->where('is_admin', 0);
        if (is_null($pelukis)) {
            abort(404);
        }
        return view('guest.pelukis-detail', compact('pelukis'));
    }

    public function pelukisAr($id) {
        $pelukis = User::query()->where('id', $id)->where('is_admin', 0)->first();
        if (is_null($pelukis)) {
            abort(404);
        }
        $lukisans = $pelukis->lukisansAr;
        dd($lukisans);
        return view('guest.pelukis-ar', compact('pelukis', 'lukisans'));
    }
}
