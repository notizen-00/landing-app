<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Mitra;

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




Route::get('/', function () {
    return Inertia::render('Site/Index');
});

Route::post('/register_mitra','App\Http\Controllers\MitraController@register')->name('register_mitra');
Route::get('/api/public/program','App\Http\Controllers\Api\ProgramController@index')->name('public_api.program');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', // Admin role
])->group(function () {

    $api_path = 'App\Http\Controllers\Api';

    Route::resource('api/program',$api_path.'\ProgramController');
    Route::get('api/mitra/{id}/verifikasi',$api_path.'\MitraController@verifikasi');
    Route::resource('api/mitra',$api_path.'\MitraController');
    // Route::get('api/mitra/{id}/verifikasi',$api_path.'\MitraController');
    Route::middleware(['checkRole:1'])->group(function () {
        $admin_path = 'App\Http\Controllers\Admin';
        Route::get('/admin-app', function () {
            return Inertia::render('Admin/Init');
            })->name('admin.app');
        
        Route::resource('admin-app/admin_program',$admin_path.'\ProgramController');
        Route::resource('admin-app/admin_mitra',$admin_path.'\MitraController');
        Route::resource('admin-app/admin_blog',$admin_path.'\BlogController');
        Route::resource('admin-app/admin_pengaturan',$admin_path.'\PengaturanController');

    });



    Route::middleware(['checkRole:2'])->group(function () {
        $mitra_path = 'App\Http\Controllers\Mitra';
        Route::get('/mitra-app', function () {

            // $user_id = auth()->user()->id;
            // $data_toko = Mitra::get_data_toko($user_id);
            return Inertia::render('Mitra/Dashboard',[
                    
            ]);
        })->name('mitra.app');

        Route::resource('mitra-app/mitra_toko','App\Http\Controllers\Mitra\TokoController');
        Route::resource('mitra-app/mitra_produk','App\Http\Controllers\Mitra\ProdukController');

    });


   
    Route::resource('pengaturan','App\Http\Controllers\SettingController');
    Route::resource('akun','App\Http\Controllers\AccountController');
});




