<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjams', function (Blueprint $table) {
            $table->id();
            $table->text('kode_peminjaman');
            $table->text('kode_buku');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->integer('lama_pinjam');
            $table->text('keterangan');
            $table->enum('status', ['dipinjam', 'sudah dikembalikan']);
            $table->text('anggota_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjams');
    }
};
