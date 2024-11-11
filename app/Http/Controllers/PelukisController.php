<?php

namespace App\Http\Controllers;

use App\Models\Lukisan;
use App\Http\Requests\CreateLukisan;
use App\Http\Requests\CreateLukisanAr;
use App\Http\Requests\EditLukisan;
use App\Http\Requests\EditLukisanAr;
use App\Http\Requests\EditProfilePelukis;
use App\Models\LukisanAr;
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
            // $input['image'] = $request->file('image')->store('lukisan', 'public');
            $fileName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('lukisan'), $fileName);
            $input['image'] = '/lukisan/' . $fileName;
        } else {
            return redirect()->back()->with('error', 'lukisan tidak boleh kosong');
        }

        $user->lukisans()->create($input);

        return redirect()->back()->with('success', 'lukisan berhasil disimpan');
    }

    public function lukisanEdit($id) {
        $lukisan = Lukisan::find($id);
        return view('pelukis.lukisan-edit', compact('lukisan'));
    }

    public function lukisanUpdate(EditLukisan $request, $id) {
        $input = $request->validated();
        $lukisan = Lukisan::find($id);

        if (!$lukisan) {
            return redirect()->back()->with('error', 'lukisan tidak ditemukan');
        }

        if ($request->has('image')) {
            // $input['image'] = $request->file('image')->store('lukisan', 'public');
            $fileName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('lukisan'), $fileName);
            $input['image'] = '/lukisan/' . $fileName;
        }

        $lukisan->update($input);
        return redirect()->back()->with('success', 'lukisan berhasil diupdate');
    }

    public function lukisanDestroy($id) {
        $lukisan = Lukisan::find($id);
        $lukisan->delete();
        return redirect()->back()->with('success', 'lukisan berhasil dihapus');
    }

    public function lukisanAr() {
        $user = auth()->user();
        $lukisan = LukisanAr::all()->where('id_creator', $user->id);
        return view('pelukis.lukisan-ar-index', compact('lukisan'));
    }

    public function lukisanArCreate() {
        $user = auth()->user();
        $lukisanCount = LukisanAr::all()->where('id_creator', $user->id)->count();
        if ($lukisanCount == 5) {
            return redirect()->back()->with('error', 'anda hanya bisa membuat 5 lukisan AR. silakan hapus salah satu atau ubah lukisan yang sudah ada');
        }
        return view('pelukis.lukisan-ar-create');
    }

    public function lukisanArEdit($id) {
        $lukisan = LukisanAr::find($id);
        return view('pelukis.lukisan-ar-edit', compact('lukisan'));
    }

    public function lukisanArStore(CreateLukisanAr $request) {
        $user = auth()->user();
        $lukisanCount = LukisanAr::all()->where('id_creator', $user->id)->count();
        if ($lukisanCount == 5) {
            return redirect()->back()->with('error', 'anda hanya bisa membuat 5 lukisan AR. silakan hapus salah satu atau ubah lukisan yang sudah ada');
        }

        $input = $request->validated();

        if ($request->has('image')) {
            $fileName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('lukisan'), $fileName);
            $input['image'] = '/lukisan/' . $fileName;
        } else {
            return redirect()->back()->with('error', 'lukisan tidak boleh kosong');
        }

        $user = User::query()->where('id', auth()->user()->id)->first();
        $user->lukisansAr()->create($input);

        return redirect()->route('pelukis.lukisanAr.index')->with('success', 'lukisan berhasil disimpan');
    }

    public function lukisanArUpdate(EditLukisanAr $request, $id) {
        $input = $request->validated();
        $lukisan = LukisanAr::find($id);

        if (!$lukisan) {
            return redirect()->back()->with('error', 'lukisan tidak ditemukan');
        }

        if ($request->has('image')) {
            $fileName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('lukisan'), $fileName);
            $input['image'] = '/lukisan/' . $fileName;
        }

        $lukisan->update($input);
        return redirect()->back()->with('success', 'lukisan berhasil diupdate');
    }

    public function lukisanArDestroy($id) {
        $lukisan = LukisanAr::find($id);
        $lukisan->delete();
        return redirect()->back()->with('success', 'lukisan berhasil dihapus');
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
            // $input['image'] = $request->file('image')->store('profile', 'public');
            $fileName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('profile_picture'), $fileName);
            $input['image'] = '/profile_picture/' . $fileName;
        }

        $user->update($input);

        return redirect()->back()->with('success', 'profile berhasil diupdate');
    }
}
