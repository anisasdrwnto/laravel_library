<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Buku extends Model
{
     use HasFactory;

    protected $table = 'bukus'; //nama tabel
    protected $primaryKey = 'id'; //primary key di table dokter

    protected $fillable = [  //masukkan nama2 field dari table dokter
            'kode_buku',
            'judul',
            'kategori_id',
            'penerbit_id',
            'isbn',
            'pengarang',
            'jumlah_halaman',
            'jumlah_stock',
            'tahun_terbit',
            'sinopsis',
            'gambar'
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
