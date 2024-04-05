@extends('template')
@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Kategori Baru</h2>
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

<form action="{{ route('ktgr.store')}}" method="POST">
    @csrf 
         <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Kategori:</strong>
                    <input type="text" name="kode_kategori" id="kd-kategori" class="form-control" placeholder="Kode Kategori" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Kategori:</strong>
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori">
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
            url: "/getCodeKategori", // Ganti dengan path yang sesuai
            method: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#kd-kategori').val(data[0].code);
            }
        });
       
    });
</script>
@endsection