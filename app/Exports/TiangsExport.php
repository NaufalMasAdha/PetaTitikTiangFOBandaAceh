<?php

namespace App\Exports;

use App\Models\Tiang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TiangsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tiang::get([
                'alamat',
                'tahun_pembangunan',
                'tinggi',
                'tipe',
                'latitude',
                'longitude',]);
    }

    public function headings(): array
    {
        return [
            'Alamat',
            'Tahun Pembangunan',
            'Tinggi',
            'Tipe',
            'Latitude',
            'Longitude',
        ];
    }
}
