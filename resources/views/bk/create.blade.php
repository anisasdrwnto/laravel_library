@extends('template')

@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Buku Baru</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{route('bk.index')}}">Kembali</a>
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



<form action="{{ route('bk.store')}}" method="POST">
    @csrf 
         <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Buku:</strong>
                    <input type="text" id="kode-buku" name="kode_buku" class="form-control" placeholder="Kode Buku" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul Buku:</strong>
                    <input type="text" name="judul" class="form-control" placeholder="Judul Buku">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pengarang:</strong>
                    <input type="text" name="pengarang" class="form-control" placeholder="Pengarang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tahun Terbit:</strong>
                    <input type="number"  class="form-control" id="tahun" name="tahun_terbit" min="1900" max="2099" step="1" placeholder="Masukkan Tahun Terbit">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategori:</strong>
                    <select class="form-control" id="kategori" name="kategori_id">
                        <option value="" selected disabled>Pilih Kategori</option>
                            @foreach($kategoriList as $kategoriOption)
                        <option value="{{ $kategoriOption }}">{{ $kategoriOption }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Penerbit:</strong>
                    <select class="form-control" id="penerbit" name="penerbit_id">
                        <option value="" selected disabled>Pilih Penerbit</option>
                        @foreach($PenerbitList as $PenerbitOption)
                        <option value="{{ $PenerbitOption}}">{{ $PenerbitOption}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stok Buku:</strong>
                    <input type="text" name="jumlah_stock" class="form-control" placeholder="Jumlah Stok Buku">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
</form>
<script>
    $(document).ready(function(){
        $.ajax({
            url: "/getCodeBuku", // Ganti dengan path yang sesuai
            method: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#kode-buku').val(data[0].code);
            }
        });
       
    });
</script>
@endsection
