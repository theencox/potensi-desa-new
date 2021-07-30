<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.newLogin');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]);
        $kredensil = $request->only('email', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user ->level == 'user') {
                return redirect()->intended('homepage');
            }
            return redirect()->intended('admin');
        }
        return redirect('login');
    }

    // public function logout(Request $request) {
    //     $request->session()->flush();
    //     Auth::logout();
    //     return redirect('login');
    // }


}
