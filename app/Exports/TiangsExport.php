<?php

namespace App\Exports;

use App\Models\Tiang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TiangsExport implements FromCollection,WithHeadings
{

    protected $tahun_pembangunan;

    function __construct($tahun_pembangunan) {
        $this->tahun_pembangunan = $tahun_pembangunan;
     }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->tahun_pembangunan != 'all'){
            return Tiang::where('tahun_pembangunan', $this->tahun_pembangunan)->get([
                'nama',
                'alamat',
                'tahun_pembangunan',
                'tinggi',
                'tipe',
                'latitude',
                'longitude']);
        }else{
            return Tiang::get([
                'nama',
                'alamat',
                'tahun_pembangunan',
                'tinggi',
                'tipe',
                'latitude',
                'longitude']);
        }
    }

    public function headings(): array
    {
        return [
            'Nama Tiang',
            'Alamat',
            'Tahun Pembangunan',
            'Tinggi',
            'Tipe',
            'Latitude',
            'Longitude',
        ];
    }
}
