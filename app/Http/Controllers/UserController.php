<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\Doc;
use App\Models\Profildesa;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $doc = Doc::all();
        $profildesa= Profildesa::all();
        $berita = Berita::all();
        return view('homepage.home', compact('doc', 'profildesa', 'berita'));
    }
    public function indexLogin()
    {
        $docs = Doc::all();
        $profildesa= Profildesa::all();
        $user= User::all();
        $berita = Berita::all();
        return view('user.index', compact('docs', 'profildesa', 'berita'));
    }
}
