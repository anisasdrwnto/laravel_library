<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris'; //nama tabel
    protected $primaryKey = 'id'; //primary key di table dokter

    protected $fillable = [  //masukkan nama2 field dari table dokter
            'kode_kategori',
            'nama_kategori',
    ];

    public static function getCode($code)
    {
        // Panggil prosedur untuk mendapatkan kode baru
        $query = "CALL generatorPerpus('".$code."')";
        // var_dump($query);
        // die;
        $result = DB::select($query);
        
        // Ambil hasil kode peminjaman dari hasil prosedur
        return $result;
    }
}
