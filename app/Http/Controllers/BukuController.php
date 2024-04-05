<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Support\Facades\Hash;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data Buku dari database, diurutkan dari yang terbaru, dan dibagi per halaman (paginate)
        $bk = Buku::latest()->paginate(6);

        // Mengembalikan view 'bk.index' dengan data Buku dan nomor halaman
        return view('bk.index', compact('bk'))->with('1', (request()->input('page', 1) -1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $kategoriList = Kategori::distinct()->pluck('kode_kategori');
       $PenerbitList  = Penerbit::distinct()->pluck('kode_penerbit');
       return view('bk.create', ['kategoriList' => $kategoriList, 'PenerbitList' => $PenerbitList]);

        //    return view('bk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data Buku
        $request->validate([
            'kode_buku'     => 'required',
            'judul'         => 'required',
            'pengarang'     => 'required',
            'tahun_terbit'  => 'required',
            'kategori_id'   => 'required',
            'penerbit_id'   => 'required',
            'jumlah_stock'  => 'required'
        ]);

        // Menyimpan data Buku baru ke dalam database
        Buku::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('bk.index')->with('success', 'Data Buku berhasil diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $bk)
    {
        // Menampilkan detail Buku berdasarkan ID
        return view('bk.show', compact('bk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $bk)
    {
        return view('bk.edit', compact('bk'));
        // Menampilkan form untuk mengedit data Buku berdasarkan ID
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $bk)
    {
        
        // Validasi input data Buku yang akan diupdate
        $request->validate([
            'kode_buku'     => 'required',
            'judul'         => 'required',
            'pengarang'     => 'required',
            'tahun_terbit'  => 'required',
            'kategori_id'   => 'required',
            'penerbit_id'   => 'required',
            'jumlah_stock'  => 'required'
        ]);


        // Mengupdate data Buku berdasarkan ID
        $bk->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('bk.index')->with('success', 'Buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $bk)
    {
        // Menghapus data Buku berdasarkan ID
        $bk->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('bk.index')->with('success', 'Buku berhasil dihapus');
    }

    public function getCodeBuku(){
        $code         = Buku::getCode("BK");
        // var_dump($code);
        // die;
        return json_encode($code);
    }
}
