<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use Illuminate\Support\Facades\Hash;

class PenerbitController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data Penerbit dari database, diurutkan dari yang terbaru, dan dibagi per halaman (paginate)
        $pnrbt = Penerbit::latest()->paginate(6);

        // Mengembalikan view 'pnrbt.index' dengan data Penerbit dan nomor halaman
        return view('pnrbt.index', compact('pnrbt'))->with('1', (request()->input('page', 1) -1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('pnrbt.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data Penerbit
        $request->validate([
            'kode_penerbit' => 'required',
            'nama_penerbit' => 'required',
        ]);

        // Menyimpan data Penerbit baru ke dalam database
        Penerbit::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pnrbt.index')->with('success', 'Data Penerbit berhasil diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $pnrbt)
    {
        // Menampilkan detail Penerbit berdasarkan ID
        return view('pnrbt.show', compact('pnrbt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerbit $pnrbt)
    {
        return view('pnrbt.edit', compact('pnrbt'));
        // Menampilkan form untuk mengedit data Penerbit berdasarkan ID
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerbit $pnrbt)
    {
        
        // Validasi input data Penerbit yang akan diupdate
        $request->validate([
            'kode_penerbit'             => 'required',
            'nama_penerbit'             => 'required'
        ]);


        // Mengupdate data Penerbit berdasarkan ID
        $pnrbt->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pnrbt.index')->with('success', 'Penerbit berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerbit $pnrbt)
    {
        // Menghapus data Penerbit berdasarkan ID
        $pnrbt->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pnrbt.index')->with('success', 'Penerbit berhasil dihapus');
    }

    public function getCodePenerbit(){
        $code      = Penerbit::getCode("PB");
        // var_dump($code);
        // die;
        return json_encode($code);
    }
}
