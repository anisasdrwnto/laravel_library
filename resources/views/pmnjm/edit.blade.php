@extends('template')
@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Peminjam</h2>
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

<form action="{{ route('pmnjm.update', $pmnjm->id)}}" method="POST">
    @csrf 
        @method('PUT')
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Peminjaman:</strong>
                <input type="text" class="form-control" name="kode_peminjaman" placeholder="Kode Peminjaman" value="{{$pmnjm->kode_peminjaman}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Anggota:</strong>
                <select class="form-control" name="anggota_id" id="anggota">
                    <option value="" selected disabled>Pilih Anggota</option>
                    @foreach($anggotaList as $anggotaOption)
                    <option value="{{ $anggotaOption }}"  @if($pmnjm->anggota_id == $anggotaOption) selected @endif>
                        {{ $anggotaOption }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Buku:</strong>
                    <input type="text" class="form-control" id="kode_buku" placeholder="Cari Kode Buku" name="kode_buku" value="{{$pmnjm-> kode_buku}}">
                </div>
                    <button type="button" class="btn btn-primary" style="width: 20%;" id="btnCekStok">Cari disini &nbsp;<span class="fas fa-search"></span></button>
             </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Pinjam:</strong>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" placeholder="Tanggal Pinjam" onchange="hitungLamaPinjam()" value="{{$pmnjm->tanggal_pinjam}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Kembali:</strong>
                    <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" placeholder="Tanggal Kembali" onchange="hitungLamaPinjam()" value="{{$pmnjm->tanggal_kembali}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lama Pinjam:</strong>
                    <input type="text" name="lama_pinjam" id="lama_pinjam" class="form-control" placeholder="Lama Pinjam" readonly value="{{ $pmnjm-> lama_pinjam}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    <textarea class="form-control" name="keterangan" placeholder="Keterangan" value="{{ $pmnjm->keterangan }} ">{{$pmnjm->keterangan}}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status" class="form-control" id="status">
                        @if($pmnjm->status == 'dipinjam')
                            <option value="sudah dikembalikan">Sudah Dikembalikan</option>
                            <option value="dipinjam" selected>Dipinjam</option>
                        @elseif($pmnjm->status == 'sudah dikembalikan')
                            <option value="sudah dikembalikan" selected>Sudah Dikembalikan</option>
                            <option value="dipinjam">Dipinjam</option>
                        @endif
                    </select>
                    <input type="hidden" id="oldStatus" name="oldStatus" value="{{ $pmnjm->status }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User ID:</strong>
                    @foreach ($users as $user)
                        <div>
                            <input type="text" name="user_id" value="{{ $user->id }}" class="form-control" readonly>
                        </div>
                    @endforeach
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
    const inputKodeBuku = document.getElementById('kode_buku');

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
            // Tampilkan pesan alert jika stok buku kosong
            if (data.jumlah_stock === 0) {
                alert('Maaf, tidak bisa meminjam buku karena stok kosong');
                $('#status').val(''); // Kosongkan status jika stok kosong
                $('#kode_buku').val('');
            } else {
                alert('Anda bisa meminjam buku');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
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
</script>
@endsection