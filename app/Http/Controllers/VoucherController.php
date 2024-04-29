<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Models\Game;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    public function index()
    {
        $data = DB::table('voucher')->select(
            'voucher.id',
            'voucher.price',
            'voucher.quantity',
            'voucher.discount',
            'voucher.expired_at',
            'game.name AS name_game',
            'item.name AS name_item',
            'kategori.name_kategori'
        )
        ->join('game','game.id','=','voucher.id_game')
        ->join('item','item.id','=','game.id_item')
        ->join('kategori','kategori.id','=','game.id_kategori')
        ->orderByDesc('id')
        ->paginate(10);
        return view('voucher.index', compact('data'));
    }

    public function create()
    {
        $game = Game::get();
        return view('voucher.create', compact('game'));
    }

    public function store(StoreVoucherRequest $request)
    {
        $request_data = $request->all();
        $data = Voucher::create($request_data);
        if($data){
            return redirect()->route('voucher.index')->with('success', 'Data voucher berhasil ditambah');
        }else{
            return redirect()->route('voucher.create')->with('error', 'Data voucher gagal ditambah');
        }
    }

    public function edit($id)
    {
        $data = Voucher::findOrFail($id);
        $game = Game::get();
        return view('voucher.edit', compact('data', 'game'));
    }

    public function update(UpdateVoucherRequest $request, $id)
    {
        $request_data = $request->all();
        $data = Voucher::findOrFail($id);
        $update = $data->update($request_data);
        if($update){
            return redirect()->route('voucher.index')->with('success', 'Data voucher berhasil diubah');
        }else{
            return redirect()->route('voucher.edit', $id)->with('error', 'Data voucher gagal diubah');
        }
    }

    public function destroy($id)
    {
        $data = Voucher::findOrFail($id);
        $delete = $data->delete();
        if($delete){
            return redirect()->route('voucher.index')->with('success', 'Data voucher berhasil dihapus');
        }else{
            return redirect()->route('voucher.index')->with('error', 'Data voucher gagal dihapus');
        }
    }
}
