<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instansi; 
use App\Models\Tiang; 
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
            'zoom' => 13,
            'markers' => $markers
        );

        return view('map_home', ['map' => $map_center]);
    }

    public function index_tiang(){
        $tiangs = Tiang::paginate(8);
        return view('map.index', ['tiangs' => $tiangs]);
        
    }
    public function index_instansi(Instansi $instansi){
        $instansis = Instansi::paginate(8);
        return view('instansi.index', ['instansis' => $instansis]);
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
