<?php

namespace App\Imports;

use App\Models\Tiang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TiangsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tiang([
            
            'alamat' => $row['alamat'],
            'tahun_pembangunan' => $row['tahun_pembangunan'],
            'tinggi' => $row['tinggi'],
            'tipe' => $row['tipe'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
        ]);
    }
}
