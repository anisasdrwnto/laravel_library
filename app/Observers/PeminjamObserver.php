<?php

namespace App\Observers;

use App\Models\Peminjam;
use App\Models\PeminjamDetail;

class PeminjamObserver
{
    /**
     * Handle the Peminjam "created" event.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return void
     */
    public function created(Peminjam $peminjam)
    {
        // Tambahkan log ke PeminjamDetail saat Peminjam baru dibuat
        $peminjamDetail = new PeminjamDetail();
        $peminjamDetail->peminjaman_id = $peminjam->kode_peminjaman;
        $peminjamDetail->buku_id = $peminjam->kode_buku;
        $peminjamDetail->jumlah = 1; // Atur jumlah sesuai kebutuhan
        $peminjamDetail->save();
    }

    /**
     * Handle the Peminjam "updated" event.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return void
     */
    public function updated(Peminjam $peminjam)
    {
        // Update PeminjamDetail jika ada perubahan pada Peminjam
        // Contoh: Anda dapat menambahkan log jika ada perubahan lain yang ingin Anda pantau
        // Misalnya, jika ada perubahan pada kode peminjaman atau kode buku
        $peminjamDetails = PeminjamDetail::where('peminjaman_id', $peminjam->kode_peminjaman)
                                          ->where('buku_id', $peminjam->kode_buku)
                                          ->first();
        
        if ($peminjamDetails) {
            // Misalnya, jika Anda ingin menambah jumlah saat ada perubahan pada Peminjam
            $peminjamDetails->jumlah += 1;
            $peminjamDetails->save();
        }
    }

    /**
     * Handle the Peminjam "deleted" event.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return void
     */
    public function deleted(Peminjam $peminjam)
    {
        // Hapus PeminjamDetail yang terkait saat Peminjam dihapus
        PeminjamDetail::where('peminjaman_id', $peminjam->kode_peminjaman)
                      ->where('buku_id', $peminjam->kode_buku)
                      ->delete();
    }
}
