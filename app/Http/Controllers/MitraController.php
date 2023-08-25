<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mitra;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Inertia\Inertia;
class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Mitra/Init');
    }

    public function register(Request $request)
    {
        
        $data_user = [
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'role_id'=>2
        ];

        $user = User::create($data_user);

        if($user){
            $data_mitra = [
                'user_id'=>$user->id,
                'no_mitra'=>Str::uuid(),
                'program_id'=>1,
                'nama_usaha'=>$request->nama_usaha,
                'deskripsi_usaha'=>'',
                'nama_kecamatan'=>'test',
                'alamat_usaha'=>$request->alamat_usaha,
                'no_ijin_usaha'=>$request->no_ijin_usaha,
                'npwp_usaha'=>$request->no_npwp,
                'status_mitra'=>0
            ];
    
            $mitra = Mitra::create($data_mitra);
        }
        
        if($mitra && $user){

            return Inertia::location(route('login'));

        }


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
