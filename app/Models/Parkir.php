<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Parkir extends Model
{
    use HasFactory;
    //tabel berisikan field yang dapat diisi apabila di akses modelnya
    protected $fillable = [
        'id',
        'plat_no',
        'jenis_kendaraan',
        'foto',
        'biaya',
    ];

    //mengambil tabel bernama parkiran pada database
    protected $table = 'parkiran';
    
}

