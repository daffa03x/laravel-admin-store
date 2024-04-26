<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::orderByDesc('id')->paginate(5);
        return view('kategori.index',compact('data'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(StoreKategoriRequest $request)
    {   
        $data = Kategori::create($request->all());
        if($data){
            return redirect()->route('kategori.index')->with('success', 'Berhasil Tambah Kategori');
        }else{
            return redirect()->route('kategori.create')->with('error', 'Gagal Tambah Kategori');
        }
    }

    public function edit($id)
    {
        $data = Kategori::findOrFail($id);
        return view('kategori.edit',compact('data'));
    }

    public function update(UpdateKategoriRequest $request, $id)
    {
        $data = Kategori::findOrFail($id);
        $data->update($request->all());
        if($data){
            return redirect()->route('kategori.index')->with('success', 'Berhasil Update Kategori');
        }else{
            return redirect()->route('kategori.edit',$id)->with('error', 'Gagal Update Kategori');
        }
    }

    public function destroy($id)
    {
        $data = Kategori::findOrFail($id);
        $data->delete();
        if($data){
            return redirect()->route('kategori.index')->with('success', 'Berhasil Hapus Kategori');
        }else{
            return redirect()->route('kategori.index')->with('error', 'Gagal Hapus Kategori');
        }
    }
}
