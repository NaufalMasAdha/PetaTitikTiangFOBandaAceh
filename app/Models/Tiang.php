<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiang extends Model
{
    use HasFactory;

     protected $fillable = [
        'alamat',
        'tahun_pembangunan',
        'tinggi',
        'tipe',
        'latitude',
        'longitude',
    ];

    public $sortable = [   
        'tahun_pembangunan',
        'tinggi',
        'tipe',
        'latitude',
        'longitude'];
}
