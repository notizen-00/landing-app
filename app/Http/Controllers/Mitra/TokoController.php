<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Produk;
use App\Models\Mitra;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $data_produk = Produk::where('mitra_id',$mitra_id)->get();
        $user_id = auth()->user()->id;
        $mitra_id = Mitra::where('user_id',$user_id)->first();
        $data_produk = Produk::where('mitra_id',$mitra_id->id)->get();

        return Inertia::render('Mitra/Toko',[
            'data_produk'=>$data_produk
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
