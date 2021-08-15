<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instansi; 
use App\Models\Tiang; 
use DB;
class MapController extends Controller
{
    public function index($tahun='all'){
        
        $thn = Tiang::select('tahun_pembangunan',DB::raw('count(*) as total'))->groupBy('tahun_pembangunan')->get();

        if($tahun == 'all'){
            $tiang = Tiang::all();
        }else{
            $tiang = Tiang::where('tahun_pembangunan', $tahun)->get();
        }


        $instansi = Instansi::all();

        $markers = array();


        foreach($tiang as $t){
            array_push($markers, array(
                'title' => $t->tahun_pembangunan,
                'lat' => $t->latitude,
                'lng' => $t->longitude,
                'icon' => '/fo.png',
                'iconAnchor' => [12,37],
                'popup' => "
                    <strong> Tiang $t->id </strong> ($t->tahun_pembangunan) <br>
                    <strong> Tipe:  </strong> $t->tipe <br>
                    <strong> Tinggi: </strong> $t->tinggi meter

             "));
        }

        foreach($instansi as $i){
            array_push($markers, array(
                'title' => $i->nama,
                'lat' => $i->latitude,
                'lng' => $i->longitude,
                'icon' => '/instansi.png',
                'iconAnchor' => [12,37],
                'popup' => '<strong>' .$i->nama .'</strong>'));
        }

        $map_center = array(
            'lat' => 5.553581817511479, 
            'lng' => 95.31728569439134, 
            'zoom' => 14,
            'markers' => $markers
        );

        return view('map_home', ['map' => $map_center, 'thn' => $thn]);
    }

    // Bagian CRUD Tiang
    public function tiang(Tiang $tiang){
        $i = 1;
        $data = Tiang::select('tahun_pembangunan',DB::raw('count(*) as total'))->groupBy('tahun_pembangunan')->get();
        return view('tiang.tiang', ['data' => $data, 'i' => $i]);

    }

    public function daftar_tiang($tahun, Tiang $tiang){
        $tiangs = $tiang->where('tahun_pembangunan', $tahun)->sortable()->paginate(20);
        return view('tiang.index', ['tiangs' => $tiangs,'tahun' => $tahun, 'i' => 1]);
    }

    public function tambah_tiang($tahun){
        return view('tiang.create',['tahun' => $tahun]);
    }

    public function store_tiang(Request $request){
        $request->validate([
            'alamat' => 'required',
            'tahun_pembangunan' => 'required',
            'tinggi' => 'required',
            'tipe' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
            
        ]);

        Tiang::create([
            'alamat' =>  $request->alamat,
            'tahun_pembangunan' => $request->tahun_pembangunan,
            'tinggi' => $request->tinggi,
            'tipe' => $request->tipe,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);
        return redirect()->route('daftar_tiang',$request->tahun_pembangunan)->with(['success' => 'Tiang berhasil ditambahkan']);
    }

    public function edit_tiang( $id){
        $tiang = Tiang::findOrFail($id);
        return view("tiang.edit", ['tiang'=>$tiang]);
    }

    public function update_tiang(Request $request ,$id){
        $request->validate([
            'alamat' => 'required',
            'tahun_pembangunan' => 'required',
            'tinggi' => 'required',
            'tipe' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
            
        ]);

        Tiang::find($id)->update([
            'alamat' =>  $request->alamat,
            'tahun_pembangunan' => $request->tahun_pembangunan,
            'tinggi' => $request->tinggi,
            'tipe' => $request->tipe,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);
        return redirect()->route('daftar_tiang',$request->tahun_pembangunan)->with(['success' => 'Tiang berhasil diperbarui']);
    }
    
    public function delete_tiang($id){
        $tiang = Tiang::findOrFail($id);
        $tiang->delete();
        return back()->with('deleted', 'Tiang dengan ID : '. $id .' telah dihapus');
    }

    public function delete_tiang_grup($tahun){
        $tiang = Tiang::where('tahun_pembangunan', $tahun)->get();
        $tiang->each->delete();
        return redirect()->route('tiang')->with('deleted', 'Tiang ('. $tahun .') telah dihapus');
    }

    // Bagian CRUD instansi
    public function daftar_instansi(Instansi $instansi){
        $instansis = $instansi->sortable()->paginate(20);
        return view('instansi.index', ['instansis' => $instansis, 'i' => 1]);
    }

    public function tambah_instansi(){
        return view('instansi.create');
    }

    public function store_instansi(Request $request){
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
            
        ]);

        Instansi::create([
            'nama' => $request->nama,
            'alamat' =>  $request->alamat,
            'no_hp' => $request->no_hp,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);
        return redirect()->route('daftar_instansi')->with(['success' => 'Instansi berhasil ditambahkan']);
    }

    public function edit_instansi( $id){
        $instansi = Instansi::findOrFail($id);
        return view("instansi.edit", ['instansi'=>$instansi]);
    }

    public function update_instansi(Request $request ,$id){

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Instansi::find($id)->update([
            'nama' => $request->nama,
            'alamat' =>  $request->alamat,
            'no_hp' => $request->no_hp,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);
        return redirect()->route('daftar_instansi')->with(['success' => 'Instansi berhasil diperbarui']);
    }

    public function delete_instansi($id){
        $instansi = Instansi::findOrFail($id);
        $instansi->delete();
        return redirect()->route('daftar_instansi')->with('deleted', 'Instansi dengan ID : '. $id .' telah dihapus');
    }
}
