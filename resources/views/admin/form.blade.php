@extends('layout.admin')

@section('title', 'Form Tambah')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Form Tambah</h2>
                <form action="/admin/create" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror " name="name" id="name"
                            value="{{ old('name') }}" placeholder="">
                        @error('name')<div class=" invalid-feedback"> {{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror " name="password"
                            id="password">
                    </div>
                    <div class="mb-3">
                        <label for="nohandphone" class="form-label">No Handphone</label>
                        <input type="number" class="form-control  @error('nohandphone') is-invalid @enderror "
                            name="nohandphone" id="nohandphone" value="{{ old('nohandphone') }}">
                        @error('nohandphone')<div class=" invalid-feedback"> {{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tangallahir') is-invalid @enderror  "
                            name="tangallahir" id="tanggallahir" value="{{ old('tangallahir') }}">
                        @error('tangalahir')<div class=" invalid-feedback"> {{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror " name="email"
                            id="email" placeholder="name@example.com" value="{{ old('email') }}">
                        @error('email')<div class=" invalid-feedback"> {{ $message }}</div> @enderror
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
                        <input type="number" class="form-control @error('noktp') is-invalid @enderror  " name="noktp"
                            id="noktp" value="{{ old('noktp') }}">
                        @error('noktp')<div class=" invalid-feedback"> {{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <img src="" class="img-preview img-fluid col-sm-5 d-block" alt="">
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror " name="gambar"
                            id="gambar" value="" onchange="previewImage()">
                        @error('gambar')<div class=" invalid-feedback"> {{ $message }}</div> @enderror
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
<script>
    function previewImage() {
        const gambar = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(gambar.files[0]);

        ofReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
