<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\CreatePelukis;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function pelukis() {
        $pelukis = User::all()->where('is_admin', 0);
        return view('admin.pelukis-index', compact('pelukis'));
    }

    public function pelukisCreate() {
        $users = User::all()->where('is_admin', 0);

        return view('admin.pelukis-create');
    }

    public function pelukisStore(CreatePelukis $request) {
        $input = $request->validated();

        if ($request->has('profile_picture')) {
            $input['profile_picture'] = $request->file('profile_picture')->store('profile_picture', 'public');
        }

        $input['password_raw'] = $input['password'];
        $input['password'] = Hash::make($input['password']);

        User::create($input);

        return redirect()->back()->with('success', 'Berhasil Menyimpan Data Pelukis');
    }
}
