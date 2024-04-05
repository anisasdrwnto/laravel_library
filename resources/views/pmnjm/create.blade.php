@extends('template')
@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Peminjam</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{route('pmnjm.index')}}">Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input gagal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pmnjm.store')}}" method="POST">
    @csrf 
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Peminjaman</strong>
                <input type="text" name="kode_peminjaman" id="form-codepeminjam" class="form-control" placeholder="Kode Peminjaman" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Anggota:</strong>
                <select class="form-control" name="anggota_id" id="anggota">
                    <option value="" selected disabled>Pilih Anggota</option>
                   @foreach($anggotaList as $anggotaOption)
                         <option class="anggotaOption" value="{{ $anggotaOption->kode_anggota }}">{{$anggotaOption->kode_anggota}}-{{ $anggotaOption->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Buku:</strong>
                    <select class="form-control" name="kode_buku" id="kode-buku">
                        @foreach($bukuList as $bukuOption)
                         <option class="bukuOption" value="{{ $bukuOption->kode_buku }}">{{$bukuOption->kode_buku}}-{{ $bukuOption->judul}}</option>
                        @endforeach
                    </select>
                </div>
                    <button type="button" class="btn btn-primary" style="width: 20%;" id="btnCekStok">Cari disini &nbsp;<span class="fas fa-search"></span></button>
             </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Pinjam:</strong>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" placeholder="Tanggal Pinjam" onchange="hitungLamaPinjam()">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Kembali:</strong>
                    <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" placeholder="Tanggal Kembali" onchange="hitungLamaPinjam()">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lama Pinjam:</strong>
                    <input type="text" name="lama_pinjam" id="lama_pinjam" class="form-control" placeholder="Lama Pinjam" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <strong>Status:</strong>
                            <select name="status" class="form-control" id="status">
                                <option>-Status-</option>
                                <option value="dipinjam">Dipinjam</option>
                                <option value="sudah dikembalikan">Dikembalikan</option>
                            </select>  
                </div>     
            </div>

           <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User ID:</strong>
                    <input type="text" name="user_id" value="{{ Auth::user()->id }}" class="form-control" readonly>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const btnCekStok = document.getElementById('btnCekStok');
    const inputKodeBuku = document.getElementById('kode-buku');

    // Tambahkan event listener untuk klik tombol
    btnCekStok.addEventListener('click', function() {
        const kodeBuku = inputKodeBuku.value;
        fetch('/cek-stock-buku', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                kode_buku: kodeBuku
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if(data.length > 0){
                // Tampilkan pesan alert jika stok buku kosong
                if (data.jumlah_stock === 0) {
                    alert('Maaf, tidak bisa meminjam buku karena stok kosong');
                    $('#kode-buku').val('');
                }else{
                    alert('Anda bisa meminjam buku');
                    $('#kode-buku').val();
                }
            }else{
                alert('Anda bisa meminjam buku');
                $('#kode-buku').val();
            }
            
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
  
    function hitungLamaPinjam() {
        // Ambil tanggal pinjam dan tanggal kembali
        var tanggalPinjam = new Date(document.getElementById('tanggal_pinjam').value);
        var tanggalKembali = new Date(document.getElementById('tanggal_kembali').value);
        
        // Hitung selisih hari
        var selisih = Math.abs(tanggalKembali - tanggalPinjam);
        var lamaPinjam = Math.ceil(selisih / (1000 * 60 * 60 * 24));

        // Set nilai lama pinjam pada input
        document.getElementById('lama_pinjam').value = lamaPinjam;
    }
    
    $(document).ready(function(){
        $.ajax({
            url: "/getCodePeminjam", // Ganti dengan path yang sesuai
            method: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#form-codepeminjam').val(data[0].code);
            }
        });
       
    });

</script>
@endsection