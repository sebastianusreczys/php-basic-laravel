@extends('layout.main')
@section('container')
    <div class="container mt-2">
        <h3 class="text-capitalize">Daftar Member</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-responsive table-striped table-hover table-bordered">
            <thead>
                <tr class="text-uppercase">
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No Ktp</th>
                    <th scope="col">foto</th>
                    <th scope="">Aksi</th>
                </tr>
            </thead>
            <tbody class="fw-light">
                @foreach ($users as $m)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $m->nama }}</td>
                        <td>{{ $m->no_hp }}</td>
                        <td>{{ $m->tanggal_lahir }}</td>
                        <td>{{ $m->email }}</td>
                        <td>{{ $m->jenis_kelamin }}</td>
                        <td>{{ $m->no_ktp }}</td>
                        <td><img src="{{ asset('storage/' . $m->foto) }} " alt="" width="50"></td>
                        <td>
                            <button class="btn btn-success"><a href="{{ $user->id }}/edit">
                                    <i class="fa fa-edit text-white"></i> </a></button>
                            <i>
                                <form action="{{ $user->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <a href="#" class=""></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
