<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
$admin_path = 'App\Http\Controllers\Admin';
$mitra_path = 'App\Http\Controllers\Mitra';
Route::get('/', function () {
    return Inertia::render('Site/Index');
});

Route::post('/register_mitra','App\Http\Controllers\MitraController@register')->name('register_mitra');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', // Admin role
])->group(function () {


    Route::middleware(['checkRole:1'])->group(function () {
       
    Route::get('/admin-app', function () {
            return Inertia::render('AdminDashboard');
        })->name('admin.app');
    });

    Route::middleware(['checkRole:2'])->group(function () {
   
        Route::get('/mitra-app', function () {
            return Inertia::render('App/Mitra');
        })->name('mitra.app');

        Route::resource('mitra-app/mitra','App\Http\Controllers\Mitra\TokoController');

    });


   
    Route::resource('pengaturan','App\Http\Controllers\SettingController');
    Route::resource('akun','App\Http\Controllers\AccountController');
});




