<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lukisan;

class GalleryController extends Controller
{
    public function showGallery(){
        $data['lukisan'] =Lukisan::all();

        return view('gallery',$data);
    }
}
