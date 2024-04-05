@extends('template')
@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Show Peminjam</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{route('pmnjm.index')}}">Kembali</a>
        </div>
    </div>
</div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Peminjaman:</strong>
                    {{$pmnjm->kode_peminjaman}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Anggota:</strong>
                   {{$pmnjm->anggota_id}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Buku:</strong>
                   {{$pmnjm->buku->kode_buku}}
                </div>
            </div>
@endsection