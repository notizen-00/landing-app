<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use App\Models\Program;
class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $program = Program::get();
        return Inertia::render('Admin/Program/Index',[
            'data_program'=>$program
        ]);
    }

    public function getData(){

        $program = Program::get();

        return response()->json($program);
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

        $program = Program::destroy($id);
        // $program->forceDelete();
        
        if (!$program) {
            return redirect()->route('admin_program.index')->with('error', 'Data tidak ditemukan.');
        }

    
        return redirect()->route('admin_program.index')->with('success', 'Data berhasil dihapus.');
    }
}
