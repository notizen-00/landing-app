<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Services\VerifikasiService;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mitra::with('users')->with('program')->get();

        return response()->json($data);
    }

    public function getMitra(){
        
        $data = Mitra::with('users')->with('program')->get();

        return response()->json($data);
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
        $data = Mitra::with('users')->with('program')->where('id',$id)->first();

        return response()->json($data);
    }

    public function showProduk(string $id)
    {

        $data = Mitra::with('produk')->where('id',$id)->get();

       return response()->json($data);

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

    public function verifikasi(string $id, VerifikasiService $verifikasiService)
    {

        $result = $verifikasiService->verifyMitra($id);

        return response()->json($result);

    }
}
