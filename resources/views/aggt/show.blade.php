@extends('template')
@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Show Anggota</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{route('aggt.index')}}">Kembali</a>
        </div>
    </div>
</div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode anggota:</strong>
                    {{$aggt->kode_anggota}}
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama anggota:</strong>
                   {{$aggt->nama}}
                </div>
            </div>
@endsection