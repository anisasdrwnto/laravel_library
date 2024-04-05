<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas'; //nama tabel
    protected $primaryKey = 'id'; //primary key di table dokter

    protected $fillable = [  //masukkan nama2 field dari table dokter
            'kode_anggota',
            'nama',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'telpon',
            'alamat',
            'foto',
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
