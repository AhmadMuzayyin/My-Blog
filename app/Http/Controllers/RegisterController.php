<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.register',[
            'title' => 'Form Registrasi',
            'active' => 'login'
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
        // Validation with no ajax jquery
        $validasi = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|min:7|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // $validasi['password'] = bcrypt($validasi['password']);
        $validasi['password'] = Hash::make($validasi['password']);
        // dd($validasi);
        User::create($validasi);

        // $request->session()->flash('success', 'Berhasil mendaftar! Silahkan login');

        return redirect('/login')->with('success', 'Berhasil mendaftar! Silahkan login');


        // Validation with Ajax Jquery
        // $rules = [
        //     'name' => 'required',
        //     'username' => 'required|unique:users|min:7|max:255',
        //     'email' => 'required|email',
        //     'password' => 'required|min:5|max:255'
        // ];

        // $msg = [
        //     'name.required' => 'isi nama anda terlebih dahulu!',
        //     'username.required' => 'isi username anda terlebih dahulu!',
        //     'username.unique' => 'username sudah digunakan',
        //     'email.required' => 'isi email anda terlebih dahulu!',
        //     'password.required' => 'isi password anda terlebih dahulu!',
        //     'password.min' => 'password minimal 5 karakter!'
        // ];

        // $validator = Validator::make($request->all(), $rules, $msg);

        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()->first()]);
        // }else{
        //     $user = new User;
        //     $user->name = $request->name;
        //     $user->username = $request->username;
        //     $user->email = $request->email;
        //     $user->password = bcrypt($request->email);
        //     dd($user);
        //     $user->save();
        //     return response()->json(['success' => 'Berhasil menambah data!']);
        // }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
