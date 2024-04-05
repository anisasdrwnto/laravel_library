<style>
    .table th,
    .table td {
        height: 20px; /* Sesuaikan tinggi sesuai kebutuhan */
    }
</style>

@extends('template')

@section('content')
    <div class="row mt-5 mb-6">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD Kategori</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{route('ktgr.create')}}"><span class="fas fa-plus"></span></a>
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
                <th width="15%" class="text-center">Kode Kategori</th>
                <th width="15%" class="text-center">Nama Kategori</th>
                <th width="35%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ktgr as $kategori)
                @php
                    $i = 1;
                @endphp
                <tr>
                    <td class="text-center">{{$i++}}</td>
                    <td>{{$kategori->kode_kategori}}</td>
                    <td>{{$kategori->nama_kategori}}</td>
                    <td class="text-center">
                        <form action = "{{route('ktgr.destroy', $kategori->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{route('ktgr.show', $kategori->id) }}"><span class="fas fa-eye"></span></a>
                            <a class="btn btn-warning btn-sm" href="{{route('ktgr.edit',$kategori->id) }}"><span class="fas fa-pen"></span></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="fas fa-trash"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{!! $ktgr->links() !!}}
@endsection
 