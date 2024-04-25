<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $data = User::orderByDesc('id')->paginate(10);
        return view('user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'password' => 'required',
        ]);

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        if($data){
            return redirect()->route('user.index')->with('success', 'Berhasil Tambah User');
        }else{
            return redirect()->route('user.create')->with('error', 'Gagal Tambah User');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $request->validate([
            'name' =>'required',
            'email' =>'required',
        ]);
        $update = $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if($update){
            return redirect()->route('user.index')->with('success', 'Berhasil Ubah User');
        }else{
            return redirect()->route('user.edit',$id)->with('error', 'Gagal Ubah User');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $delete = $data->delete();
        if($delete){
            return redirect()->route('user.index')->with('success', 'Berhasil Hapus User');
        }else{
            return redirect()->route('user.index')->with('error', 'Gagal Hapus User');
        }
    }
}
