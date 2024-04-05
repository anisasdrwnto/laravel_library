@extends('template')
@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Kategori Baru</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{route('ktgr.index')}}">Kembali</a>
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

<form action="{{ route('ktgr.update', $ktgr->id) }}" method="POST">
    @csrf 
        @method('PUT')
         <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Kategori:</strong>
                    <input type="text" name="kode_kategori" class="form-control" placeholder="Kode Kategori" value="{{ $ktgr->kode_kategori }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Kategori:</strong>
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="{{ $ktgr->nama_kategori}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
</form>
@endsection