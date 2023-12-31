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
                'program_id'=>$request->jenis_usaha,
                'nama_usaha'=>$request->nama_usaha,
                'jumlah_karyawan'=>$request->jumlah_tenaga_kerja, 
                'nama_kecamatan'=>$request->kecamatan,
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
        $validator = $request->validate([
            'nama_program'=>'required',
            'deskripsi_program'=>'nullable',
    ]);
    $data = $validator + [
            'status_program' => 1,
        ];

    $program = Program::create($data);
    
    if($program)
    {
        return redirect()->route('admin_program.index')->with('success', 'Data berhasil ditambahkan.');

    }else{

        return redirect()->route('admin_program.index')->with('error', 'Data Gagal ditambahkan.');

    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Mitra::with('users')->with('program')->where('id',$id)->first();
    
        return Inertia::render('Site/DetailMitra',[
            'data_mitra'=>$data,
        ]);
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
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
