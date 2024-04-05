<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjam;

class PeminjamDetailsController extends Controller
{
    public function index()
    {
        $pd = new Peminjam();
        // $pmdetails = array(
        //     'js' => 'assets/js/menu/detailpinjam.js'
        // );
        // var_dump($pmdetails);
        // die;
        // $pmdetails = PeminjamDetail::with('peminjam', 'buku')->get();

        //$pmdetails = PeminjamDetail::latest()->paginate(10);
        $pmdetails = $pd->peminjam();
        // var_dump($pmdetails);
        // die;
        return view('pmdetails.index', compact('pmdetails'));
    }

    // public function getHistoryPeminjam(){
    //     $code = $this->request->getGet('kode_buku');

    //     $query = "SELECT p.kode_peminjaman, p.kode_buku FROM peminjams AS p INNER JOIN peminjam_details AS pd ON p.peminjaman_id = pd.kode_peminjaman AND p.kode_buku = pd.buku_id'" . $code . "'";
    //     var_dump($query);
    //     die;

    //     $result = $this->db->query($query)->getResult();
    //     return json_encode($result);
    // }

    
}
