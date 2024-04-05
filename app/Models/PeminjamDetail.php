<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class PeminjamDetail extends Model
{
    use HasFactory;

    protected $table = 'peminjam_details'; // Nama tabel

    protected $fillable = [
       'peminjaman_id',
       'buku_id',
       'jumlah'
    ];

    //protected $db;

    // public function __construct()
    // {
    //     $this->db = db_connect();
    // }

    public function peminjam(){
        
        $pinjam = DB::select("SELECT b.kode_buku, b.judul, COUNT(p.kode_buku) AS dipinjam, b.jumlah_stock - COUNT(p.kode_buku) AS stok_tersisa FROM peminjams p JOIN bukus b ON p.kode_buku = b.kode_buku WHERE status = 'dipinjam'
        GROUP BY b.kode_buku, b.judul, b.jumlah_stock");
        // var_dump($pinjam);
        // die;
        return $pinjam;
        
    }

    // public function peminjam()
    // {
    //     return $this->belongsTo(Peminjam::class, 'peminjaman_id', 'kode_peminjaman')->where('buku_id', $this->buku_id);
    // }
   

    // // Definisikan relasi dengan model Buku
    // public function buku()
    // {
    //     return $this->belongsTo(Buku::class, 'buku_id', 'kode_buku');
    // }
}
