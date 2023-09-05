<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Produk;
use App\Models\Mitra;
use Illuminate\Support\Facades\Validator;

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
        $validator = $request->validate([
            'nama_usaha' => 'required',
            'deskripsi_usaha' => 'nullable',
            'no_ijin_usaha' => 'required',
            'npwp_usaha' => 'required',
            'alamat_usaha'=>'required',
            'nama_kecamatan'=>'required',
            'jumlah_karyawan'=>'required',
            'foto_usaha' => 'nullable|mimes:jpg,png,jpeg,gif'
        ]);
    
        $mitra = Mitra::findOrFail($id);
    
        $data = $validator;
    
        if ($request->hasFile('foto_usaha')) {

            if ($mitra->foto_usaha) {
                Storage::delete('public/foto_usaha/' . $produk->foto_produk);
            }

            $file = $request->file('foto_usaha');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $fileExtension;
            $filePath = 'public/foto_usaha';
    
            $file->storeAs($filePath, $fileName);
            $data['foto_usaha'] = $fileName;
        }
    
        $update = Mitra::where('id',$id)->update($data);
    
        if($update){
            return to_route('mitra_toko.index');

        }else{
            dd('eerpr');
        }
     
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
