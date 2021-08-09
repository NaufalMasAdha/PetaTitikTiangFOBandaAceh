<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Instansi extends Model
{
    use HasFactory;
    use Sortable;

     protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'latitude',
        'longitude',
    ];


        public $sortable = [   
        'nama',
        'alamat',
    ];


}
