<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = $request->validate([
            'nama_produk'=>'required',
            'deskripsi_produk'=>'nullable',
            'harga_produk'=>'integer|required',
            'stok_produk'=>'integer|required',
            'foto_produk'=>'nullable|mimes:jpg,png,jpeg,gif|dimensions:max_width=500'
        ]);
        $data = $validator + [
            'status_produk' => 1,
            'mitra_id'=>$request->mitra_id
        ];

     

    $produk = Produk::create($data);
    
    if($produk)
    {
        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $fileExtension;
            $filePath = 'public/foto_produk';
    
            $file->storeAs($filePath, $fileName);
            $produk->update(['foto_produk' => $fileName]);
        }
        // return redirect()->route('mitra_toko.index')->with('success', 'Data Produk berhasil ditambahkan.');
        return to_route('mitra_toko.index');

    }else{
       return to_route('mitra_toko.index');
        // return redirect()->route('mitra_toko.index')->with('error', 'Data Produk Gagal ditambahkan.');

    }
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
