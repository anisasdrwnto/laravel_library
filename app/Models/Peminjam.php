<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Peminjam extends Model
{
    use HasFactory;


    protected $table = 'peminjams'; //nama tabel
    protected $primaryKey = 'id'; //primary key di table dokter

    protected $fillable = [ 
        'kode_peminjaman', //masukkan nama2 field dari table dokter
        'tanggal_pinjam',
        'tanggal_kembali',
        'lama_pinjam',
        'keterangan',
        'status',
        'anggota_id',
        'kode_buku',
        'user_id'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'kode_buku', 'kode_buku');
    }

    public static function getKodeBuku($bukuId) {
        return Buku::where('id', $bukuId)->value('kode_buku');
    }
    
    public function anggota(){
        return $this->belongsTo(Anggota::class, 'anggota_id', 'kode_anggota');
    }
    public function pengembalian(){
        return $this->belongsTo(Kembali::class, 'tanggal_kembali');
    }

    public function peminjam(){
        
        $pinjam = DB::select("SELECT b.kode_buku, b.judul, COUNT(p.kode_buku) AS dipinjam, b.jumlah_stock - COUNT(p.kode_buku) AS stok_tersisa FROM peminjams p JOIN bukus b ON p.kode_buku = b.kode_buku WHERE status = 'dipinjam'
        GROUP BY b.kode_buku, b.judul, b.jumlah_stock");
        // var_dump($pinjam);
        // die;
        return $pinjam;
        
    }

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
