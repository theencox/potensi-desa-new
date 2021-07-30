<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilUserController extends Controller
{
    public function index()
    {
        $user = auth();
        return view('profil.index', compact('user'));
    }
    public function edit()
    {
        return view ('profil.edit')->with('user', auth()->user());
    }

    public function update(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'nomorhp' => 'required',
        ]);
        $user = auth()->user();
        $data = User::findOrfail($user->id);
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('gambar', 'public');
            if ($data->gambar) {
                Storage::delete(['public/'. $data->gambar]);
                $data->gambar = $gambar;
            }
            else {
                $data->gambar = $gambar;
            }
        }
        $data->save();
        User::where('id', $user->id)
                ->update([
                    'name' => $request->name,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'nomorhp' => $request->nomorhp,
                ]);
        return redirect('/profil')->with('status', 'Data berhasil diubah');
    }

}
