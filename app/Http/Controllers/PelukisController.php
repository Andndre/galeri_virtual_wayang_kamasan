<?php

namespace App\Http\Controllers;

use App\Models\Lukisan;
use App\Http\Requests\CreateLukisan;
use App\Http\Requests\EditProfilePelukis;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PelukisController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_pelukis');
        $this->middleware('set_language_id');
    }

    public function index() {
        return view('pelukis.home');
    }

    public function lukisan() {
        $user = auth()->user();
        $lukisan = Lukisan::all()->where('id_creator', $user->id);
        return view('pelukis.lukisan-index', compact('lukisan'));
    }

    public function lukisanCreate() {
        return view('pelukis.lukisan-create');
    }

    public function lukisanStore(CreateLukisan $request) {
        $input = $request->validated();

        $user = User::query()->where('id', auth()->user()->id)->first();

        if ($request->has('image')) {
            $input['image'] = $request->file('image')->store('lukisan', 'public');
        } else {
            return redirect()->back()->with('error', 'lukisan tidak boleh kosong');
        }

        $user->lukisans()->create($input);

        return redirect()->back()->with('success', 'lukisan berhasil disimpan');
    }

    public function lukisanAr() {
        return view('pelukis.lukisan-ar-index');
    }

    public function lukisanArCreate() {
        return view('pelukis.lukisan-ar-create');
    }

    public function lukisanArStore() {

    }

    public function profile() {
        $user = auth()->user();
        return view('pelukis.profile', compact('user'));
    }

    public function profileUpdate(EditProfilePelukis $request) {
        $auth = auth()->user();
        $user = User::find($auth->id);
        $input = $request->validated();

        if ($request->has('image')) {
            $input['image'] = $request->file('image')->store('profile', 'public');
        }

        $user->update($input);

        return redirect()->back()->with('success', 'profile berhasil diupdate');
    }
}
