<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Kembali extends Model
{
     use HasFactory;

    protected $table = 'kembalis'; //nama tabel
    protected $primaryKey = 'id'; //primary key di table dokter

    protected $fillable = [  //masukkan nama2 field dari table dokter
            'peminjaman_id',
            'tanggal_kembali',
            'user_id',
    ];
}
