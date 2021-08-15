<?php

namespace App\Imports;

use App\Models\Instansi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InstansisImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Instansi([
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'no_hp' => $row['no_hp'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
        ]);
    }
}
