<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\TingkatDepresiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RulesController;
use App\Models\Diagnosa;
use App\Models\TingkatDepresi;
use App\Models\KondisiUser;
use App\Models\Gejala;
use App\Models\User;
use App\Models\Rules;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ========== Halaman Umum / Publik ==========

// Landing page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Halaman form diagnosa user
Route::get('/form', function () {
    $data = [
        'gejala' => Gejala::all(),
        'kondisi_user' => KondisiUser::all()
    ];
    return view('form', $data);
})->name('form');

// Halaman FAQ / alternatif form lanjutan
Route::get('/form-faq', function () {
    $data = [
        'gejala' => Gejala::all(),
        'kondisi_user' => KondisiUser::all()
    ];
    return view('faq', $data);
})->name('cl.form');

// ========== Proses Diagnosa ==========

Route::resource('/spk', DiagnosaController::class)->only(['store']);
Route::get('/spk/result/{id}', [DiagnosaController::class, 'diagnosaResult'])->name('spk.result');
Route::get('/diagnosa/{id}/cetak-pdf', [DiagnosaController::class, 'cetakPDF'])->name('diagnosa.cetak');

// ========== Autentikasi ==========
Auth::routes();

// ========== Halaman Admin (Prefix: /admin) ==========
Route::middleware('auth')->prefix('admin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        $data = [
            'gejala' => Gejala::all(),
            'kondisi_user' => KondisiUser::all(),
            'user' => User::all(),
            'tingkat_depresi' => TingkatDepresi::all(),
            'rules' => Rules::all(),
        ];
        return view('admin.dashboard', $data);
    })->name('admin.dashboard');

    // Daftar Admin
    Route::get('/list', function () {
        $data = ['user' => User::all()];
        return view('admin.list_admin', $data);
    })->name('admin.list');



    // Resource untuk data
    Route::resource('/gejala', GejalaController::class);
    Route::resource('/depresi', TingkatDepresiController::class);
    Route::resource('/spk', DiagnosaController::class)->only(['index']);
    Route::resource('/user', UserController::class);
    Route::resource('/rules', RulesController::class);


    // Redirect /admin/home ke dashboard
    Route::get('/home', function () {
        return redirect()->route('admin.dashboard');
    });
        
});
