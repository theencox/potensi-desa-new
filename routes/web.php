<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KritikdansaranController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\ProfildesaController;
use App\Http\Controllers\PotensiDesaController;
use App\Http\Controllers\ProfilUserController;
use App\Http\Controllers\UserController;
use App\Models\PotensiDesa;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index']);
// Route::get('/', function () {
//     return view('homepage.home');
// });
Route::get('/upload', function () {
    return view('upload');
});


//kritik dan saran
Route::get('/kritikdansaran', [KritikdansaranController::class, 'index']);
Route::get('/kritikdansaran/create', [KritikdansaranController::class, 'create']);
Route::get('/kritikdansaranpages', [KritikdansaranController::class, 'createPages']);
Route::get('/kritikdansaranpage', [KritikdansaranController::class, 'createPages_Login']);
Route::post('/kritikdansaranpages', [KritikdansaranController::class, 'store']);
Route::post('/kritikdansaranpage', [KritikdansaranController::class, 'storeLogin']);
Route::get('/kritikdansaran/{kritikdansaran}', [KritikdansaranController::class, 'show']);
Route::delete('/kritikdansaran/{kritikdansaran}', [KritikdansaranController::class, 'destroy']);
Route::get('/kritikdansaran/{kritikdansaran}/edit', [KritikdansaranController::class, 'edit']);
Route::patch('/kritikdansaran/{kritikdansaran}', [KritikdansaranController::class, 'update']);
//doc
Route::get('/doc', [DocController::class, 'index']);
Route::get('/docpages', [DocController::class, 'home']);
Route::get('/docpage', [DocController::class, 'home_login']);
Route::get('/doc/create', [DocController::class, 'create']);
Route::post('/doc', [DocController::class, 'store']);
Route::delete('/doc/{doc}', [DocController::class, 'destroy']);
Route::get('/doc/{doc}/edit', [DocController::class, 'edit']);
Route::patch('/doc/{doc}', [DocController::class, 'update']);
//profil desa
Route::get('/profildesa', [ProfildesaController::class, 'index']);
Route::get('/profildesapages', [ProfildesaController::class, 'indexPages']);
Route::get('/profildesapage', [ProfildesaController::class, 'indexPages_Login']);
Route::get('/profildesa/{profildesa}', [ProfildesaController::class, 'show']);
Route::get('/profildesapages/{profildesapages}', [ProfildesaController::class, 'showPages']);
Route::get('/profildesapage/{user}', [ProfildesaController::class, 'showPages_Login']);
Route::get('/profildesa/{profildesa}/edit', [ProfildesaController::class, 'edit']);
Route::patch('/profildesa/{profildesa}', [ProfildesaController::class, 'update']);
//potensidesa
Route::get('/potensidesa', [PotensiDesaController::class, 'index']);
Route::get('/potensidesapages', [PotensiDesaController::class, 'indexPages']);
Route::get('/potensidesapage', [PotensiDesaController::class, 'indexPages_Login']);
Route::post('/potensidesa/{potensidesa}', [PotensiDesaController::class, 'store']);
Route::get('/potensidesa/{potensidesa}/create', [PotensiDesaController::class, 'create']);
Route::get('/potensidesa/{potensidesa}', [PotensiDesaController::class, 'show']);
Route::get('/potensidesa/{potensidesas}/show', [PotensiDesaController::class, 'showPart']);
Route::get('/potensidesapages/{potensidesapages}', [PotensiDesaController::class, 'showPages']);
Route::get('/potensidesapage/{user}', [PotensiDesaController::class, 'showPages_Login']);
Route::get('/potensidesa/{potensidesa}/edit', [PotensiDesaController::class, 'edit']);
Route::patch('/potensidesa/{potensidesa}', [PotensiDesaController::class, 'update']);
//profil user
Route::get('/profil', [ProfilUserController::class, 'index']);
Route::patch('/profil', [ProfilUserController::class, 'update']);
Route::get('/profil/edit', [ProfilUserController::class, 'edit']);
//berita
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/beritapages', [BeritaController::class, 'indexPages']);
Route::get('/beritapage', [BeritaController::class, 'indexlogin']);
Route::get('/berita/create', [BeritaController::class, 'create']);
Route::post('/berita', [BeritaController::class, 'store']);
Route::get('/berita/{berita}', [BeritaController::class, 'show']);
Route::get('/beritapages/{beritapages}', [BeritaController::class, 'showPages']);
Route::get('/beritapage/{user}', [BeritaController::class, 'showLogin']);
Route::delete('/berita/{berita}', [BeritaController::class, 'destroy']);
Route::delete('/berita/detail/{user}', [BeritaController::class, 'destroyComment']);
Route::delete('/beritapage/{user}', [BeritaController::class, 'destroyComments']);
Route::post('/beritapage/{user}', [BeritaController::class, 'storeComment']);
Route::get('/berita/{berita}/edit', [BeritaController::class, 'edit']);
Route::patch('/berita/{berita}', [BeritaController::class, 'update']);
Route::patch('/berita/detail/{comment}', [BeritaController::class, 'updateStatus']);



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
        // Route::get('/admin', function () {
        //     return view('admin.index');
        // })->name('admin');
    });
    Route::group(['middleware' => ['cek_login:user']], function () {
        Route::get('/homepage', [UserController::class, 'indexLogin'])->name('user');
        // Route::get('/homepage', function () {
        //     return view('user.index');
        // })->name('user');
    });
});

Route::get('/home', [App\Http\Controllers\UserController::class, 'indexLogin'])->name('home');
