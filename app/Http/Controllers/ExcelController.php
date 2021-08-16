<?php
     
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Exports\InstansisExport;
use App\Imports\InstansisImport;
use App\Exports\TiangsExport;
use App\Imports\TiangsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
    
class ExcelController extends Controller
{


    public function export_tiang() 
    {
        return Excel::download(new TiangsExport, 'tiang-fo.xlsx');
    }
   
    public function import_tiang(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = $file->hashName();

        $path = $file->storeAs('public/excel/',$nama_file);
        
        try{
            $import = Excel::import(new TiangsImport(), storage_path('app/public/excel/'.$nama_file));
        }catch(\Exception $e){
            return redirect()->route('tiang')->with(['deleted' => 'Data Gagal Diimport!']);
        }

        Storage::delete($path);

        return redirect()->route('tiang')->with(['success' => 'Data Berhasil Diimport!']);
    }

    // ODP
        public function export_instansi() 
    {
        return Excel::download(new InstansisExport, 'instansi.xlsx');
    }
   
    public function import_instansi(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = $file->hashName();

        $path = $file->storeAs('public/excel/',$nama_file);
        
        try{
            $import = Excel::import(new InstansisImport(), storage_path('app/public/excel/'.$nama_file));
        }catch(\Exception $e){
            return redirect()->route('tambah_instansi')->with(['deleted' => 'Data Gagal Diimport!']);
        }

        Storage::delete($path);

        return redirect()->route('daftar_instansi')->with(['success' => 'Data Berhasil Diimport!']);
    }
}
