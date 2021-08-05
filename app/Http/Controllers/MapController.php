<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){
        $map_center = array(
            'lat' => 5.573279429238394, 
            'lng' => 95.3455186237172,
            'zoom' => 15
        );

        return view('map_home', ['map' => $map_center]);
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
