<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Berita::findOrFail(1);

        return Inertia::render('Admin/Blog/View',[
            'data_berita'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Blog/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'judul'=>'required',
            'author'=>'required',
            'deskripsi'=>'nullable',
            'konten'=>'required'
         ]);
         $data = $validator + [
            'status_berita' => 1,
        ];

    $berita = Berita::create($data);
    
    if($berita)
    {
        return redirect()->route('admin_blog.index')->with('success', 'Data berhasil ditambahkan.');

    }else{

        return redirect()->route('admin_blog.index')->with('error', 'Data Gagal ditambahkan.');

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
        $data = Berita::findOrFail($id);
        return Inertia::render('Admin/Blog/Edit',[
            'detail'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'judul'=>'required',
            'author'=>'nullable',
            'deskripsi'=>'required',
            'konten'=>'required',
        ]);
        $data = $validator + [
            'status_berita' => 1,
        ];

    $insert = Berita::where('id',$id)->update($data);
    
    if($insert)
    {
        return redirect()->route('admin_blog.index')->with('success', 'Data berhasil di Update.');

    }else{

        return redirect()->route('admin_blog.index')->with('error', 'Data Gagal di Update.');

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
