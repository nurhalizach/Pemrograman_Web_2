<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
    }

    public function showDataUser(){
        $data['users'] =User::all();

        return view('data_user',$data);
    }

    public function buat()
    {
        return view('tambahUser');
    }

    public function tambah(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        
        $query = DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
        
        if ($query) {
            return redirect()->route('user.showDataUser')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('user.showDataUser')->with('failed', 'Data Gagal Ditambahkan');
        }
    }
    
    public function edit(string $id)
    {
        $data['users'] = DB::table('users')->where('id', $id)->first();
        
        return view('editUser', $data);
    }
    
    public function ubah(Request $request, string $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        
        $query = DB::table('users')->where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        if ($query) {
            return redirect()->route('user.showDataUser')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('user.showDataUser')->with('failed', 'Data Gagal Diupdate');
        }
    }

    public function hapus(Request $request, string $id)
    {
        $query = DB::table('users')->where('id', $id)->delete();

        if ($query) {
            return redirect()->route('user.showDataUser')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('user.showDataUser')->with('failed', 'Data Gagal Dihapus');
        }
    }


}
