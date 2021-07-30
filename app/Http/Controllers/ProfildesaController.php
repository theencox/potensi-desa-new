<?php

namespace App\Http\Controllers;

use App\Models\Profildesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfildesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profildesa = Profildesa::all();
        return view('profildesa.index', compact('profildesa'));
    }
    public function indexPages()
    {
        $profildesapages = Profildesa::all();
        return view('profildesapages.index', compact('profildesapages'));
    }
    public function indexPages_Login()
    {
        $profildesapages = Profildesa::all();
        return view('user.profildesa', compact('profildesapages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profildesa  $profildesa
     * @return \Illuminate\Http\Response
     */
    public function show(Profildesa $profildesa)
    {
        return view ('profildesa.show', compact('profildesa'));
    }

    public function showPages(Profildesa $profildesapages)
    {
        return view ('profildesapages.show', compact('profildesapages'));
    }
    public function showPages_login(Profildesa $user)
    {
        return view ('user.profilshow', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profildesa  $profildesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Profildesa $profildesa)
    {
        return view ('profildesa.edit', compact('profildesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profildesa  $profildesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profildesa $profildesa)
    {
        $request->validate([
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,gif'
        ]);

        $data = Profildesa::findOrfail($profildesa->id);
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

        Profildesa::where('id', $profildesa->id)
                ->update([
                    'deskripsi' => $request->deskripsi
                ]);
        return redirect('/profildesa')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profildesa  $profildesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profildesa $profildesa)
    {
        //
    }
}
