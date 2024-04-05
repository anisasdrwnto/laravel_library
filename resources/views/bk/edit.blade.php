@extends('template')
@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Buku Baru</h2>
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

<form action="{{ route('bk.update', $bk->id) }}" method="POST">
    @csrf 
        @method('PUT')
         <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Buku:</strong>
                    <input type="text" name="kode_buku" class="form-control" placeholder="Kode Buku" value="{{ $bk->kode_buku }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul Buku:</strong>
                    <input type="text" name="judul" class="form-control" placeholder="Judul Buku" value="{{ $bk->judul }}">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pengarang:</strong>
                    <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" value="{{ $bk->pengarang }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tahun Terbit:</strong>
                    <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" value="{{ $bk->tahun_terbit }}">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategori:</strong>
                    <input type="text" name="kategori_id" class="form-control" placeholder="Kategori" value="{{ $bk->kategori_id }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Penerbit:</strong>
                    <input type="text" name="penerbit_id" class="form-control" placeholder="Penerbit" value="{{ $bk->penerbit_id }}">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stok Buku:</strong>
                    <input type="text" name="jumlah_stock" class="form-control" placeholder="Jumlah Stok Buku" value="{{ $bk->jumlah_stock }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
</form>
@endsection