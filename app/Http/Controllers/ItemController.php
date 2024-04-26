<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    public function index()
    {
        $data = Item::orderByDesc('id')->paginate(10);
        return view('item.index', compact('data'));
    }

    public function create()
    {
        return view('item.create');
    }

    public function store(StoreItemRequest $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            $nama_photo = date('Ymd').$image->getClientOriginalName();
            $image->move('images/item', $nama_photo);
            $photo = 'images/item/' . $nama_photo;
        }else{
            $photo = '';
        }
        $data = Item::create([
            'name' => $request->name,
            'image' => $photo
        ]);
        if($data){
            return redirect()->route('item.index')->with('success', 'Item berhasil disimpan');
        }else{
            return redirect()->route('item.create')->with('error', 'Item gagal disimpan');
        }
    }

    public function edit($id)
    {
        $data = Item::findOrFail($id);
        return view('item.edit', compact('data'));
    }

    public function update(UpdateItemRequest $request,$id)
    {
        $data = Item::findOrFail($id);
        if($request->hasFile('image')){
            File::delete(public_path($data->image));
            $image = $request->file('image');
            $nama_photo = date('Ymd').$image->getClientOriginalName();
            $image->move('images/item', $nama_photo);
            $photo = 'images/item/' . $nama_photo;
        }else{
            $photo = $data->image;
        }
        $update = $data->update([
            'name' => $request->name,
            'image' => $photo
        ]);
        if($update){
            return redirect()->route('item.index')->with('success', 'Item berhasil diupdate');
        }else{
            return redirect()->route('item.edit', $id)->with('error', 'Item gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $data = Item::findOrFail($id);
        File::delete(public_path($data->image));
        $delete = $data->delete();
        if($delete){
            return redirect()->route('item.index')->with('success', 'Item berhasil dihapus');
        }else{
            return redirect()->route('item.index')->with('error', 'Item gagal dihapus');
        }
    }
}
