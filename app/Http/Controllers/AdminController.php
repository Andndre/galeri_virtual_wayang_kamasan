<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\CreatePelukis;
use App\Http\Requests\EditPelukis;
use App\Models\Lukisan;
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
        $pelukis = User::all()->where('is_admin', 0);
        $lukisan = Lukisan::all();
        return view('admin.home', compact('pelukis', 'lukisan'));
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

    public function pelukisEdit($id) {
        $pelukis = User::find($id);
        return view('admin.pelukis-edit', compact('pelukis'));
    }

    public function pelukisUpdate(EditPelukis $request, $id) {
        $pelukis = User::find($id);
        $input = $request->validated();

        if ($request->has('profile_picture')) {
            $input['profile_picture'] = $request->file('profile_picture')->store('profile_picture', 'public');
        }

        if ($request->has('password')) {
            $input['password'] = Hash::make($input['password']);
            $input['password_raw'] = $input['password'];
        }

        $pelukis->update($input);

        return redirect()->back()->with('success', 'Berhasil Mengubah Data Pelukis');
    }

    public function pelukisDestroy($id) {
        $pelukis = User::find($id);
        $pelukis->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data Pelukis');
    }
}
