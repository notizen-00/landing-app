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
})->name('site');

Route::get('site/mitra/{id}','App\Http\Controllers\MitraController@show')->name('site_mitra.show');
Route::get('site/berita/{id}','App\Http\Controllers\BeritaController@show')->name('site_berita.show');
Route::get('site/program/{id}','App\Http\Controllers\ProgramController@show')->name('site_program.show');

Route::middleware('verify_api_key')->group(function () {
    $api_path = 'App\Http\Controllers\Api';
    Route::get('api/kecamatan',$api_path.'\RestController@get_kecamatan');
    Route::get('api/public/mitra',$api_path.'\MitraController@getMitra');
    Route::get('api/public/mitra/{id}',$api_path.'\MitraController@show');
    Route::get('api/public/produk/mitra/{id}',$api_path.'\MitraController@showProduk');
    Route::get('api/public/berita',$api_path.'\BeritaController@index');
    Route::get('api/public/program',$api_path.'\ProgramController@index');
    
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
    Route::resource('api/berita',$api_path.'\BeritaController');
    Route::get('api/produk/mitra/{id}',$api_path.'\ProdukController@showByMitra')->name('api_produk.bymitra');
    Route::resource('api/produk',$api_path.'\ProdukController');
    
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
        Route::resource('admin-app/admin_berita',$admin_path.'\BeritaController');
        Route::get('/generate-api-key', $admin_path.'\ApiKeyController@generateApiKey');

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
        Route::resource('mitra-app/mitra_account','App\Http\Controllers\Mitra\AccountController');

    });


   
    Route::resource('pengaturan','App\Http\Controllers\SettingController');
    Route::resource('akun','App\Http\Controllers\AccountController');
});




