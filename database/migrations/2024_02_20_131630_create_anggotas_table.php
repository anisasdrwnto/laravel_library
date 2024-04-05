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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->text('kode_anggota');
            $table->text('nama');
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->text('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('telpon');
            $table->text('alamat');
            $table->text('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
