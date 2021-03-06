<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Tiang extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
    'nama',
    'alamat',
    'tahun_pembangunan',
    'tinggi',
    'tipe',
    'latitude',
    'longitude',
];

    public $sortable = [   
        'nama',
        'tahun_pembangunan',
        'tinggi',
        'tipe'
    ];
}
