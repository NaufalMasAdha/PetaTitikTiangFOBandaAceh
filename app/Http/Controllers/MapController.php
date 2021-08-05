<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){
        return view('map_home');
    }

    public function index_tiang(){
        return view('map.index');
    }
    public function index_instansi(){
        return view('instansi.index');
    }

    public function tambah_tiang(){
        return view('map.create');
    }

    public function edit_tiang(){
        return view('map.edit');
    }

    public function tambah_instansi(){
        return view('instansi.create');
    }

    public function edit_instansi(){
        return view('instansi.edit');
    }
}
