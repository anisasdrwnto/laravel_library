@extends('template')

@section('content')
    <div class="row mt-5 mb-6">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD Peminjam</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{route('pmnjm.create')}}"><span class="fas fa-plus"></span></a>
                <a class="btn btn-success" href="/home">Home</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

     @if ($message = Session::get('failed'))
        <div class="alert alert-danger">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%" class="text-center">ID</th>
                <th width="15%" class="text-center">Kode Peminjaman</th>
                <th width="15%" class="text-center">Kode Anggota</th>
                <th width="15%" class="text-center">Kode Buku</th>
                <th width="15%" class="text-center">Tanggal Pinjam</th>
                <th width="15%" class="text-center">Status</th>
                <th width="15%" class="text-center">Keterangan</th>
                <th width="35%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pmnjm as $peminjam)
                <tr>
                @php
                    $i = 1;
                @endphp
                    <td class="text-center">{{$i++}}</td>
                    <td class="text-center">{{ $peminjam->kode_peminjaman}}</td>
                    <td class="text-center">{{ $peminjam->anggota ? $peminjam->anggota->kode_anggota : '' }}</td>
                    <td>{{ $peminjam->buku ? $peminjam->buku->kode_buku : '' }}</td>
                    <td class="text-center">{{ $peminjam->tanggal_pinjam }}</td>
                    <td class="text-center">{{ $peminjam->status }}</td>
                    <td class="text-center">{{ $peminjam->keterangan}}</td>
                    <td class="text-center">
                        <form action="{{ route('pmnjm.destroy', $peminjam->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('pmnjm.show', $peminjam->id) }}"><span class="fas fa-eye"></span></a>
                            <a class="btn btn-warning btn-sm" href="{{ route('pmnjm.edit', $peminjam->id) }}"><span class="fas fa-pen"></span></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><span class="fas fa-trash"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pmnjm->links() }}
@endsection
