<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index',[
            'title' => 'Member',
            'user' => User::all(),
            'active' => 'member'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'alamat' => 'required'
        ];

        $msg = [
            'nama.required' => 'Kolom nama tidak boleh kosong!',
            'alamat.required' => 'Kolom alamat tidak boleh kosong!'
        ];

        $validasi = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $msg);
        if ($validasi->fails()) {
            return response()->json(['error' => $validasi->errors()->first()]);
        }else{
            $user = new \App\Models\User;
            $user->name = $request->nama;
            $user->address = $request->alamat;
            $user->save();
            return response()->json(['success' => 'Berhasil menambah data!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->id);
        $rules = [
            'nama' => 'required',
            'alamat' => 'required'
        ];

        $msg = [
            'nama.required' => 'Kolom nama tidak boleh kosong!',
            'alamat.required' => 'Kolom alamat tidak boleh kosong!'
        ];

        $validasi = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $msg);
        if ($validasi->fails()) {
            return response()->json(['error' => $validasi->errors()->first()]);
        }else{
            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->nama,
                'address' => $request->alamat
            ]);
            return response()->json(['success' => 'Berhasil mengubah data!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('users')->where('id', $request->id)->delete();
        return response()->json(['success' => 'Berhasil menghapus data!']);
    }
}
