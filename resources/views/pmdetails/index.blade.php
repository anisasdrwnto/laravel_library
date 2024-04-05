@extends('template')

@section('content')
    <div class="row mt-5 mb-6">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Show Peminjaman Details</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="/home" id="home">Home</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%" class="text-center">No.</th>
                <th width="15%" class="text-center">ID Buku</th>
                <th width="15%" class="text-center">Judul Buku</th>

                <th width="15%" class="text-center">Total Peminjam</th>

                <th width="20%" class="text-center">Total Buku Tersisa</th>
            </tr>
        </thead>
        <tbody id="tbpinjamdetail">
             @foreach ($pmdetails as $peminjamdetail)
                @php
                    $i = 1;
                @endphp
                <tr>
                 
                    <td class="text-center">{{$i++}}</td>
                    <td class="text-center">{{ $peminjamdetail->kode_buku}}</td>
                    <td>{{ $peminjamdetail->judul}}</td>
                    <td>{{ $peminjamdetail->dipinjam}}</td>
                    <td>{{ $peminjamdetail->stok_tersisa}}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
   
@endsection
