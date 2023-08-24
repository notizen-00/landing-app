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

Route::get('/', function () {
    return Inertia::render('Site/Index');
});

Route::post('/register_mitra','App\Http\Controllers\MitraController@register')->name('register_mitra');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', // Admin role
])->group(function () {


    Route::get('/dashboard', function () {
        return Inertia::render('CheckLayout');
    })->name('dashboard');
    Route::resource('mitra','App\Http\Controllers\MitraController');

});




