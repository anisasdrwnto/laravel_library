<style>
    .table th,
    .table td {
        height: 20px; /* Sesuaikan tinggi sesuai kebutuhan */
        width: 80px;
    }
</style>

@extends('template')

@section('content')
    <div class="row mt-5 mb-6">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD Buku</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{route('bk.create')}}">
                   <i class="fas fa-plus" style='font-size:20px'></i>
                </a>
                <a class="btn btn-success" href="/home">Home</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%" class="text-center">Id</th>
                <th width="15%" class="text-center">Kode Buku</th>
                <th width="15%" class="text-center">Judul Buku</th>
                <th width="15%" class="text-center">Pengarang</th>
                <th width="10%" class="text-center">Tahun Terbit</th>
                <th width="10%" class="text-center">Kategori</th>
                <th width="10%" class="text-center">Penerbit</th>
                <th width="10%" class="text-center">Stock Buku</th>
                <th width="35%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bk as $buku)
                @php
                    $i = 1;
                @endphp
                <tr>
                    <td class="text-center">{{$i++}}</td>
                    <td>{{$buku->kode_buku}}</td>
                    <td>{{$buku->judul}}</td>
                    <td>{{$buku->pengarang}}</td>
                    <td>{{$buku->tahun_terbit}}</td>
                    <td>{{$buku->kategori_id}}</td>
                    <td>{{$buku->penerbit_id}}</td>
                    <td>{{$buku->jumlah_stock}}</td>
                    <td class="text-center">
                        <form action = "{{route('bk.destroy', $buku->id) }}" method="POST">
                           <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-info btn-sm" href="{{route('bk.show', $buku->id) }}"><span class="fas fa-eye"></span> Show</a>
                                <a class="btn btn-warning btn-sm" href="{{route('bk.edit',$buku->id) }}"><span class="fas fa-pen"></span> Edit</a>
                                <form action="{{ route('bk.destroy', $buku->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="fas fa-trash"></span> Delete</button>
                                </form>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{!! $bk->links() !!}}
@endsection
