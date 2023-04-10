<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Models\Lukisan;

class LukisanController extends Controller{
    public function index(){
    }

    public function showDataLukisan(){
        $data['lukisan'] = Lukisan::all();

        return view('data_lukisan',$data);
    }

    public function buat()
    {
        return view('tambahLukisan');
    }

    public function tambah(Request $request)
    {
        $validateData = $request->validate([
            'image' => 'image'
        ]);


        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('images');
        }

        $title = $request->input('title');
        $artist = $request->input('artist');
        $year = $request->input('year');
        $medium = $request->input('medium');
        $description = $request->input('description');
        $image = $validateData['image'];
        
        $query = DB::table('lukisan')->insert([
            'title' => $title,
            'artist' => $artist,
            'year' => $year,
            'medium' => $medium,
            'description' => $description,
            'image' =>$image
        ]);
        
        if ($query) {
            return redirect()->route('lukisan.showDataLukisan')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('lukisan.showDataLukisan')->with('failed', 'Data Gagal Ditambahkan');
        }
    }
    
    public function edit(string $id)
    {
        $data['lukisan'] = DB::table('lukisan')->where('id', $id)->first();
        
        return view('editLukisan', $data);
    }
    
    public function ubah(Request $request, string $id)
    {
        $rules =[
            'image' => 'image'
        ];

        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->gambarLama){
                Storage::delete($request->gambarLama);
            }
            $validateData['image'] = $request->file('image')->store('images');
        }

        $title = $request->input('title');
        $artist = $request->input('artist');
        $year = $request->input('year');
        $medium = $request->input('medium');
        $description = $request->input('description');
        $image = $validateData['image'];
        
        $query = DB::table('lukisan')->where('id', $id)->update([
            'title' => $title,
            'artist' => $artist,
            'year' => $year,
            'medium' => $medium,
            'description' => $description,
            'image' => $image
        ]);

        if ($query) {
            return redirect()->route('lukisan.showDataLukisan')->with('success', 'Data Berhasil Diupdate');
        } else {
            return redirect()->route('lukisan.showDataLukisan')->with('failed', 'Data Gagal Diupdate');
        }
    }

    public function hapus(Request $request, string $id)
    {
        if($request->image){
            Storage::delete($request->image);
        }
        $query = DB::table('lukisan')->where('id', $id)->delete();

        if ($query) {
            return redirect()->route('lukisan.showDataLukisan')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('lukisan.showDataLukisan')->with('failed', 'Data Gagal Dihapus');
        }
    }


}
