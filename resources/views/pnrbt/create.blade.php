@extends('template')
@section('content')

<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Penerbit Baru</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{route('pnrbt.index')}}">Kembali</a>
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

<form action="{{ route('pnrbt.store')}}" method="POST">
    @csrf 
         <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kode Penerbit:</strong>
                    <input type="text" name="kode_penerbit" id="kd-penerbit" class="form-control" placeholder="Kode Penerbit" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Penerbit:</strong>
                    <input type="text" name="nama_penerbit" class="form-control" placeholder="Nama Penerbit">
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
            url: "/getCodePenerbit", // Ganti dengan path yang sesuai
            method: "GET",
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#kd-penerbit').val(data[0].code);
            }
        });
       
    });
</script>
@endsection