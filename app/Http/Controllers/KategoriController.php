<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;

class KategoriController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data Kategori dari database, diurutkan dari yang terbaru, dan dibagi per halaman (paginate)
        $ktgr = Kategori::latest()->paginate(6);

        // Mengembalikan view 'ktgr.index' dengan data Kategori dan nomor halaman
        return view('ktgr.index', compact('ktgr'))->with('1', (request()->input('page', 1) -1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('ktgr.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data Kategori
        $request->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required',
        ]);

        // Menyimpan data Kategori baru ke dalam database
        Kategori::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('ktgr.index')->with('success', 'Data Kategori berhasil diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $ktgr)
    {
        // Menampilkan detail Kategori berdasarkan ID
        return view('ktgr.show', compact('ktgr'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $ktgr)
    {
        return view('ktgr.edit', compact('ktgr'));
        // Menampilkan form untuk mengedit data Kategori berdasarkan ID
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $ktgr)
    {
        
        // Validasi input data Kategori yang akan diupdate
        $request->validate([
            'kode_kategori'     => 'required',
            'nama_kategori'             => 'required'
        ]);


        // Mengupdate data Kategori berdasarkan ID
        $ktgr->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('ktgr.index')->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $ktgr)
    {
        // Menghapus data Kategori berdasarkan ID
        $ktgr->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('ktgr.index')->with('success', 'Kategori berhasil dihapus');
    }

    public function getCodeKategori(){
        $code      = Kategori::getCode("KG");
        // var_dump($code);
        // die;
        return json_encode($code);
    }
}
