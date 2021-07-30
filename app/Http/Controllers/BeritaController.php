<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();
        return view('berita.index', compact('berita'));
    }


    public function indexPages()
    {
        $berita = Berita::all();
        return view('beritapages.index', compact('berita'));
    }

    public function indexLogin()
    {
        $berita = Berita::all();
        return view('user.berita', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
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



        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->user_id = $request->user_id;
        $berita->deskripsi = $request->deskripsi;
        $berita->gambar = $gambar;
        $berita->user_id = Auth::user()->id;

        $berita->save();

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,gif'
        ]);
        return redirect('/berita')->with('status', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        return view ('berita.show', compact('berita'));
    }
    public function showPages(Berita $beritapages)
    {
        return view ('beritapages.show', compact('beritapages'));
    }
    public function showLogin(Berita $user)
    {
        return view ('user.beritashow', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        return view ('berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,gif'
        ]);

        $data = Berita::findOrfail($berita->id);
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

        Berita::findOrfail($berita->id)
                ->update([
                    'judul' => $request->judul,
                    'deskripsi' => $request->deskripsi
                ]);
        return redirect('/berita')->with('status', 'Data berhasil diubah');

    }

    public function updateStatus(Request $request, Comment $comment){
        Comment::findOrfail($comment->id)
                ->update([
                    'status' => $request->status,
                ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        Berita::destroy($berita->id);
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
    // public function destroyComment(Berita $user)
    // {
    //     Comment::destroy([
    //         'berita_id' => $user->id,
    //         'user_id' => auth()->id(),
    //         'deskripsi' =>$user->deskripsi,
    //     ]);
    //     return redirect()->back();
    // }

    public function destroyComment(Comment $user)
    {
        Comment::destroy($user->id);
        return redirect()->back();
    }

    public function destroyComments(Comment $user)
    {
        Comment::destroy($user->id);
        return redirect()->back();
    }

    public function storeComment(Request $request, Berita $user)
    {
        Comment::create([
            'berita_id' => $user->id,
            'user_id' => auth()->id(),
            'deskripsi' =>$request->deskripsi,
            'status' =>0,
        ]);
        return redirect()->back();
    }
}
