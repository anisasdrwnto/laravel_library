<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data anggota dari database, diurutkan dari yang terbaru, dan dibagi per halaman (paginate)
        $aggt = Anggota::latest()->paginate(6);

        // Mengembalikan view 'aggt.index' dengan data anggota dan nomor halaman
        return view('aggt.index', compact('aggt'))->with('1', (request()->input('page', 1) -1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('aggt.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input data anggota
        $request->validate([
            'kode_anggota'  => 'required',
            'nama'          => 'required',
            'tempat_lahir'  => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'telpon'        => 'required',
            'alamat'        => 'required',
            'foto'          => 'required'
        ]);

        // Menyimpan data anggota baru ke dalam database
        Anggota::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('aggt.index')->with('success', 'Data anggota berhasil diinput');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $aggt)
    {
        // Menampilkan detail anggota berdasarkan ID
        return view('aggt.show', compact('aggt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $aggt)
    {
        return view('aggt.edit', compact('aggt'));
        // Menampilkan form untuk mengedit data anggota berdasarkan ID
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $aggt)
    {
        
        // Validasi input data anggota yang akan diupdate
        $request->validate([
            'kode_anggota'     => 'required',
            'nama'             => 'required',
            'tempat_lahir'     => 'required', 
            'jenis_kelamin'    => 'required',
            'tanggal_lahir'    => 'required',
            'telpon'           => 'required',
            'alamat'           => 'required',
            'foto'             => 'required'
        ]);


        // Mengupdate data anggota berdasarkan ID
        $aggt->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('aggt.index')->with('success', 'anggota berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $aggt)
    {
        // Menghapus data anggota berdasarkan ID
        $aggt->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('aggt.index')->with('success', 'anggota berhasil dihapus');
    }

    public function getCodeAnggota(){
        $code         = Anggota::getCode("AG");
        // var_dump($code);
        // die;
        return json_encode($code);
    }
}
