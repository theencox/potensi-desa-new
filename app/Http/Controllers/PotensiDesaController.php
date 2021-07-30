<?php

namespace App\Http\Controllers;

use App\Models\PartPotensiDesa;
use App\Models\PotensiDesa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PotensiDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $potensidesa = PotensiDesa::all();
        return view('potensidesa.index', compact('potensidesa'));
    }
    public function indexPages()
    {
        $potensidesapages = PotensiDesa::all();
        return view('potensidesapages.index', compact('potensidesapages'));
    }
    public function indexPages_Login()
    {
        $potensidesapages = PotensiDesa::all();
        return view('user.potensidesa', compact('potensidesapages'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PotensiDesa $potensidesa)
    {
        $data = PotensiDesa::with('partpotensidesa')->find($potensidesa->id);
        return view('potensidesa.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PotensiDesa $potensidesa)
    {

        if ($request->file('gambar')){
            $gambar = $request->file('gambar')->store('gambar', 'public');
        } else {
            $gambar = null;
        }

        $partpotensidesa = new PartPotensiDesa();
        $partpotensidesa->judul = $request->judul;
        $partpotensidesa->desa_id = $request->desa_id;
        $partpotensidesa->deskripsi = $request->deskripsi;
        $partpotensidesa->gambar = $gambar;
        $partpotensidesa->desa_id = $potensidesa->id;

        $partpotensidesa->save();

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,gif'
        ]);
        return redirect('/potensidesa')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PotensiDesa  $potensiDesa
     * @return \Illuminate\Http\Response
     */
    public function show(PotensiDesa $potensidesa)
    {
        return view ('potensidesa.show', compact('potensidesa'));
    }
    public function showPart(PartPotensiDesa $potensidesas)
    {
        return view ('potensidesa.showpart', compact('potensidesas'));
    }

    public function showPages(PotensiDesa $potensidesapages)
    {
        return view ('potensidesapages.show', compact('potensidesapages'));
    }
    public function showPages_login(PotensiDesa $user)
    {
        return view ('user.potensidesashow', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PotensiDesa  $potensiDesa
     * @return \Illuminate\Http\Response
     */
    public function edit(PartPotensiDesa $potensidesa)
    {
        return view ('potensidesa.edit', compact('potensidesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PotensiDesa  $potensiDesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartPotensiDesa $potensidesa)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,gif'
        ]);
        $data = PartPotensiDesa::findOrfail($potensidesa->id);
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

        // $potensidesa->gambar2 = $gambar;
        // $potensidesa->gambar3 = $gambar;



        PartPotensiDesa::where('id', $potensidesa->id)
                ->update([

                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi
                ]);
        return redirect('/potensidesa')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PotensiDesa  $potensiDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(PotensiDesa $potensidesa)
    {
        //
    }
}
