@extends('layout/main')

@section('title', 'Form Ubah Member')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="{{ $members->id }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder=""
                            value="{{ $members->nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Password</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder=""
                            value="{{ $members->password }}">
                    </div>
                    <div class="mb-3">
                        <label for="nohandphone" class="form-label">No Handphone</label>
                        <input type="number" class="form-control" name="nohandphone" id="nohandphone"
                            value="{{ $members->no_hp }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tangallahir" id="tanggallahir"
                            value="{{ $members->tanggal_lahir }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com"
                            value="{{ $members->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com"
                            value="{{ $members->jenis_kelamin }}">
                    </div>
                    <div class="mb-3">
                        <label for="noktp" class="form-label">No Ktp</label>
                        <input type="number" class="form-control" name="noktp" id="noktp"
                            value="{{ $members->no_ktp }}">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="text" class="form-control" name="gambar" id="gambar" value="{{ $members->foto }}">
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary" type="button">Ubah data member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- <div class="container">
        <h4>Pendaftaran Member</h4>
        
    </div> --}}
@endsection
