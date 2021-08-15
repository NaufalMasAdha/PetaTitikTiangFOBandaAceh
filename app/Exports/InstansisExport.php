<?php

namespace App\Exports;

use App\Models\Instansi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InstansisExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Instansi::get([
                'nama',
                'alamat',
                'no_hp',
                'latitude',
                'longitude',
            ]);
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Alamat',
            'No HP',
            'Latitude',
            'Longitude',
        ];
    }
}
