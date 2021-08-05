<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){

        $markers[] = array(
        'title' => 'Tes',
        'lat' => 5.573279429238394,
        'lng' => 95.3455186237172,
        'url' => 'https://google.com',
        'icon' => 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
        'popup' => '<h3>Details</h3><p>Click <a target="_blank" href="https://google.com">here</a>.</p>',);

        $map_center = array(
            'lat' => 5.573279429238394, 
            'lng' => 95.3455186237172,
            'zoom' => 15,
            'markers' => $markers
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
