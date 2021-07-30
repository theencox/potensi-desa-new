<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Doc;
use App\Models\Kritikdansaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_doc = Doc::all()->count();
        $total_kritikdansaran = Kritikdansaran::all()->count();
        $total_berita = Berita::all()->count();
        return view('admin.index', compact('total_doc', 'total_kritikdansaran', 'total_berita'));
    }
}
