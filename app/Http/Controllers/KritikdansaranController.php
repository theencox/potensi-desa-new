<?php

namespace App\Http\Controllers;

use App\Models\Kritikdansaran;
use Illuminate\Http\Request;

class KritikdansaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kritikdansaran = DB::table('kritikdansarans')->get();
        $kritikdansaran = Kritikdansaran::all();
        return view('kritikdansaran.index', compact('kritikdansaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kritikdansaran.create');
    }
    public function createPages()
    {
        return view('kritikdansaranpages.create');
    }
    public function createPages_Login()
    {
        return view('user.kritikdansaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $kritikdansaran = new Kritikdansaran;
        // $kritikdansaran->nama = $request->nama;
        // $kritikdansaran->alamat = $request->alamat;
        // $kritikdansaran->email = $request->email;
        // $kritikdansaran->nomorhp = $request->nomorhp;
        // $kritikdansaran->deskripsi = $request->deskripsi;

        // $kritikdansaran->save();

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'nomorhp' => 'required',
            'deskripsi' => 'required'
        ]);

        Kritikdansaran::create($request->all());
        return redirect('/kritikdansaranpages')->with('status', 'Kritik dan saran anda akan kami tinjau, terima kasih atas partisipasinya');
    }
    public function storeLogin(Request $request)
    {
        // $kritikdansaran = new Kritikdansaran;
        // $kritikdansaran->nama = $request->nama;
        // $kritikdansaran->alamat = $request->alamat;
        // $kritikdansaran->email = $request->email;
        // $kritikdansaran->nomorhp = $request->nomorhp;
        // $kritikdansaran->deskripsi = $request->deskripsi;

        // $kritikdansaran->save();

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'nomorhp' => 'required',
            'deskripsi' => 'required'
        ]);

        Kritikdansaran::create($request->all());
        return redirect('/kritikdansaranpage')->with('status', 'Kritik dan saran anda akan kami tinjau, terima kasih atas partisipasinya');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kritikdansaran  $kritikdansaran
     * @return \Illuminate\Http\Response
     */
    public function show(Kritikdansaran $kritikdansaran)
    {
        return view ('kritikdansaran.show', compact('kritikdansaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kritikdansaran  $kritikdansaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Kritikdansaran $kritikdansaran)
    {
        return view ('kritikdansaran.edit', compact('kritikdansaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kritikdansaran  $kritikdansaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kritikdansaran $kritikdansaran)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'nomorhp' => 'required',
            'deskripsi' => 'required'
        ]);
        Kritikdansaran::where('id', $kritikdansaran->id)
                ->update([
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'nomorhp' => $request->nomorhp,
                    'deskripsi' => $request->deskripsi
                ]);
        return redirect('/kritikdansaran')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kritikdansaran  $kritikdansaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kritikdansaran $kritikdansaran)
    {
        Kritikdansaran::destroy($kritikdansaran->id);
        return redirect('/kritikdansaran')->with('status', 'Data berhasil dihapus');
    }
}
