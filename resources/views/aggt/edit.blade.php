@extends('template')
@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Anggota Baru</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{route('aggt.index')}}">Kembali</a>
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

<form action="{{ route('aggt.update', $aggt->id) }}" method="POST">
    @csrf 
        @method('PUT')
         <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode anggota:</strong>
                    <input type="text" name="kode_anggota" class="form-control" placeholder="Kode anggota" value="{{ $aggt->kode_anggota }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama anggota:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama anggota" value="{{ $aggt->nama}}">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jenis Kelamin:</strong>
                    <select class="form-control" name="jenis_kelamin" value="{{$aggt->jenis_kelamin}}">
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tempat Lahir:</strong>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="{{$aggt->tempat_lahir}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Lahir:</strong>
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{$aggt->tanggal_lahir}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                     <strong>Telepon:</strong>
                <input type="text" name="telpon" class="form-control" placeholder="Telepon" value="{{$aggt->telpon}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <textarea class="form-control" name="alamat" placeholder="Alamat" value="{{$aggt->alamat}}">{{$aggt->alamat}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Foto:</strong>
                    <input type="file" name="foto" class="form-control">{{$aggt->foto}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
</form>
@endsection