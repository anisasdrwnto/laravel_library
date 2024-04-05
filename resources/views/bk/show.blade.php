@extends('template')
@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Show Buku</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{route('bk.index')}}">Kembali</a>
        </div>
    </div>
</div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Buku:</strong>
                    {{$bk->kode_buku}}
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul Buku:</strong>
                   {{$bk->judul}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pengarang:</strong>
                  {{$bk->pengarang}}
                </div>
            </div>
@endsection