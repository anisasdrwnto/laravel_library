<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Peminjam;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kembali;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PeminjamController extends Controller
{
   
    public function index(){
         // Mengambil data Kategori dari database, diurutkan dari yang terbaru, dan dibagi per halaman (paginate)
        $pmnjm = Peminjam::latest()->paginate(6);

        // Mengembalikan view 'ktgr.index' dengan data Kategori dan nomor halaman
        return view('pmnjm.index', compact('pmnjm'))->with('1', (request()->input('page', 1) -1) * 6);
    }
    public function show(Peminjam $pmnjm)
    {
        // Menampilkan detail Penerbit berdasarkan ID
        return view('pmnjm.show', compact('pmnjm'));
    }

    public function create(){
        $anggotaList  = Anggota::all();
        $bukuList     = Buku::all();
        $users        = User::all(); // Mengambil semua data pengguna dari tabel User
      
        return view('pmnjm.create', ['anggotaList' => $anggotaList, 'bukuList'=> $bukuList, 'users'=> $users]);
    }
    public function store(Request $request){
          // Validasi input data Penerbit
        $request->validate([
            'kode_peminjaman'   => 'required',
            'anggota_id'        => 'required',
            'kode_buku'         => 'required',
            'tanggal_pinjam'    => 'required',
            'lama_pinjam'       => 'required',
            'status'            => 'required',
        ]);

        // Menyimpan data Penerbit baru ke dalam database
        // var_dump($request->kode_buku);
        // die;
        $buku = DB::select("SELECT  b.jumlah_stock - COUNT(p.kode_buku) AS stok_tersisa FROM peminjams p JOIN bukus b ON p.kode_buku = b.kode_buku 
        WHERE status = 'dipinjam' AND b.kode_buku = '".$request->kode_buku."'
        GROUP BY b.jumlah_stock");

        if (sizeof($buku) > 0 ) {
            if($buku[0]->stok_tersisa > 0){
                $pmnjm = Peminjam::create($request->all());
                return redirect()->route('pmnjm.index')->with('success', 'Data Peminjaman berhasil diinput');
            }else {
                return redirect()->route('pmnjm.index')->with('failed', 'Stok buku tidak tersedia');
            }
        } else {
                $pmnjm = Peminjam::create($request->all());
                return redirect()->route('pmnjm.index')->with('success', 'Data Peminjaman berhasil diinput');
        }
        
        

        // // Mengurangi stok buku yang sesuai
        // if ($request->status == 'dipinjam') {
        //     $buku = Buku::where('kode_buku', $pmnjm->kode_buku)->first();
        //     $buku->jumlah_stock--;
        //     $buku->save();
        // }else if($request->status == 'sudah dikembalikan'){
        //     $buku = Buku::where('kode_buku', $pmnjm->kode_buku)->first();
        //     $buku->jumlah_stock++;
        //     $buku->save();
        // }

        // Redirect ke halaman index dengan pesan sukses
        
    }

     public function edit(Peminjam $pmnjm)
    {
        $anggotaList  = Anggota::distinct()->pluck('kode_anggota');
        $bukuList     = Buku::all();
        $users        = User::all(); // Mengambil semua data pengguna dari tabel User
        return view('pmnjm.edit', compact('pmnjm', 'anggotaList', 'bukuList', 'users'));
        
        // return view('pmnjm.edit', compact('pmnjm'));
        // Menampilkan form untuk mengedit data Penerbit berdasarkan ID
       
    }

    public function update(Request $request, Peminjam $pmnjm){
    // Validasi input data Peminjam
    $request->validate([
        'kode_peminjaman'   => 'required',
        'anggota_id'        => 'required',
        'kode_buku'         => 'required',
        'tanggal_pinjam'    => 'required',
        'lama_pinjam'       => 'required',
        'status'            => 'required'
    ]);

    // // Mengambil data peminjaman yang akan diupdate
    $oldStatus = $pmnjm->status;

    // Memperbarui data Peminjam dengan data baru dari request
    $pmnjm->update($request->all());

    // Mengurangi atau menambah stok buku sesuai dengan perubahan status
    // if ($request->status == 'sudah dikembalikan' && $oldStatus == 'dipinjam') {
    //     // Menambah stok buku jika status berubah dari 'dipinjam' menjadi 'dikembalikan'
    //     $buku = Buku::where('kode_buku', $pmnjm->kode_buku)->first();
    //     $buku->jumlah_stock++; // Menggunakan atribut yang benar
    //     $buku->save();
    // } elseif ($request->status == 'dipinjam' && $oldStatus == 'sudah dikembalikan') {
    //     // Mengurangi stok buku jika status berubah dari 'dikembalikan' menjadi 'dipinjam'
    //     $buku = Buku::where('kode_buku', $pmnjm->kode_buku)->first();
    //     $buku->jumlah_stock--; // Menggunakan atribut yang benar
    //     $buku->save();
    // }

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('pmnjm.index')->with('success', 'Data Peminjaman berhasil diupdate');
    }

    public function destroy(Peminjam $pmnjm)
    {
        // Menghapus data Penerbit berdasarkan ID
        $pmnjm->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pmnjm.index')->with('success', 'Peminjam berhasil dihapus');
    }

    public function cekStockBuku(Request $request){
        $kodeBuku = $request->kode_buku;
        // var_dump($kodeBuku);
        // die;
        // $buku = Buku::where('kode_buku', $kodeBuku)->first();

        $buku = DB::select("SELECT  b.jumlah_stock - COUNT(p.kode_buku) AS stok_tersisa FROM peminjams p JOIN bukus b ON p.kode_buku = b.kode_buku 
        WHERE status = 'dipinjam' AND b.kode_buku = '".$kodeBuku."'
        GROUP BY b.jumlah_stock");

        // var_dump($buku);
        // die;
        // var_dump($buku[0]->stok_tersisa);
        // die;

        if (sizeof($buku) > 0 ) {
            if($buku[0]->stok_tersisa > 0){
                return response()->json(['jumlah_stock' => $buku[0]->stok_tersisa]);
            }else {
                return response()->json(['jumlah_stock' => 0]);
            }
        } else {
            return response()->json(['jumlah_stock' => 0]);
        }
    }

        public function hitungLamaPinjam(Request $request){
            // Validasi request
            $request->validate([
                'tanggal_pinjam' => 'required|date',
                // Tidak perlu validasi untuk tanggal kembali karena diambil dari tabel Kembali
            ]);

            // Ambil tanggal pinjam dari request
            $tanggalPinjam = new \DateTime($request->tanggal_pinjam);

            // Ambil data tanggal kembali dari tabel Kembali
            $tanggalKembali = Kembali::where('id', $request->kembali_id)->value('tanggal_kembali');

            // Validasi tanggal kembali
            if (!$tanggalKembali) {
                return response()->json(['error' => 'Tanggal kembali tidak ditemukan'], 404);
            }

            // Hitung selisih hari
            $selisih = $tanggalPinjam->diff(new \DateTime($tanggalKembali));
            $lamaPinjam = $selisih->days;

            // Mengembalikan lama pinjam sebagai respons
            return response()->json(['lama_pinjam' => $lamaPinjam]);
        }
        public function getCodePeminjam(){
            // echo "test";
            $code         = Peminjam::getCode("PM");
            return json_encode($code);
            // var_dump($code);
            // die;
        }

}
