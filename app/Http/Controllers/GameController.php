<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Models\Item;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GameController extends Controller
{
    public function index()
    {
        $data = DB::table('game')->select(
            'game.id',
            'game.name',
            'kategori.name_kategori',
            'item.name AS name_item'
        )
        ->join('kategori','kategori.id','=','game.id_kategori')
        ->join('item','item.id','=','game.id_item')
        ->orderByDesc('game.id')
        ->paginate(10);
        return view('game.index',compact('data'));
    }

    public function create()
    {
        $kategori = Kategori::get();
        $item_game = Item::get();
        return view('game.create',compact('kategori','item_game'));
    }

    public function store(StoreGameRequest $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            $nama_photo = date('Ymd').$image->getClientOriginalName();
            $image->move('images/game', $nama_photo);
            $photo = 'images/game/' . $nama_photo;
        }else{
            $photo = '';
        }
        $data = Game::create([
            'id_kategori' => $request->id_kategori,
            'id_item' => $request->id_item,
            'name' => $request->name,
            'image' => $photo
        ]);
        if($data){
            return redirect()->route('game.index')->with('success', 'Game berhasil disimpan');
        }else{
            return redirect()->route('game.create')->with('error', 'Game gagal disimpan');
        }
    }

    public function edit($id)
    {
        $data = Game::findOrFail($id);
        $kategori = Kategori::get();
        $item_game = Item::get();
        return view('game.edit',compact('data','kategori','item_game'));
    }

    public function update(UpdateGameRequest $request,$id)
    {
        $data = Game::findOrFail($id);
        if($request->hasFile('image')){
            File::delete(public_path($data->image));
            $image = $request->file('image');
            $nama_photo = date('Ymd').$image->getClientOriginalName();
            $image->move('images/game', $nama_photo);
            $photo = 'images/game/' . $nama_photo;
        }else{
            $photo = $data->image;
        }
        $update = $data->update([
            'id_kategori' => $request->id_kategori,
            'id_item' => $request->id_item,
            'name' => $request->name,
            'image' => $photo
        ]);
        if($update){
            return redirect()->route('game.index')->with('success', 'Game berhasil diupdate');
        }else{
            return redirect()->route('game.edit', $id)->with('error', 'Game gagal diupdate');
        }
    }

    public function destroy($id)
    {
        $data = Game::findOrFail($id);
        File::delete(public_path($data->image));
        $delete = $data->delete();
        if($delete){
            return redirect()->route('game.index')->with('success', 'Game berhasil dihapus');
        }else{
            return redirect()->route('game.index')->with('error', 'Game gagal dihapus');
        }
    }
}
