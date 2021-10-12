@extends('layout/main')

@section('title', 'Form Pendaftaran Member')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="/member" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="nohandphone" class="form-label">No Handphone</label>
                        <input type="number" class="form-control" name="nohandphone" id="nohandphone">
                    </div>
                    <div class="mb-3">
                        <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tangallahir" id="tanggallahir">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" aria-label="Default select example" name="jeniskelamin">
                            <option selected>Pilih Jenis Kelamin</option>
                            <option value="Pria" id="jeniskelamin">Pria</option>
                            <option value="Wanita" id="jeniskelamin">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="noktp" class="form-label">No Ktp</label>
                        <input type="number" class="form-control" name="noktp" id="noktp">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-primary" type="button">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- <div class="container">
        <h4>Pendaftaran Member</h4>
        
    </div> --}}
@endsection
