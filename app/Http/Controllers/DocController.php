<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc = Doc::all();
        return view('doc.index', compact('doc'));
    }


    public function home()
    {
        $doc = Doc::all();
        return view('docpages.home', compact('doc'));
    }

    public function home_login()
    {
        $doc = Doc::all();
        return view('user.doc', compact('doc'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('gambar')){
            $gambar = $request->file('gambar')->store('gambar', 'public');
        } else {
            $gambar = null;
        }
        $doc = new Doc;
        $doc->judul = $request->judul;
        $doc->deskripsi = $request->deskripsi;
        $doc->gambar = $gambar;

        $doc->save();

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,gif'
        ]);
        return redirect('/doc')->with('status', 'Doc berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function show(Doc $doc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function edit(Doc $doc)
    {
        return view ('doc.edit', compact('doc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doc $doc)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,gif'
        ]);

        $data = Doc::findOrfail($doc->id);
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

        Doc::findOrfail($doc->id)
                ->update([
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi
                ]);
        return redirect('/doc')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doc $doc)
    {
        Doc::destroy($doc->id);
        return redirect('/doc')->with('status', 'Data berhasil dihapus');
    }
}
