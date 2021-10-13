@extends('layout/main')

@section('title', 'Form Ubah Member')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="/member/{{ $users->id }}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder=""
                            value="{{ $users->nama }}">
                    </div>
                    <div class="mb-3">
                        {{-- <label for="name" class="form-label">Password</label> --}}
                        <input type="hidden" class="form-control" name="password" id="name" placeholder=""
                            value="{{ $users->password }}">
                    </div>
                    <div class="mb-3">
                        <label for="nohandphone" class="form-label">No Handphone</label>
                        <input type="number" class="form-control" name="nohandphone" id="nohandphone"
                            value="{{ $users->no_hp }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tangallahir" id="tanggallahir"
                            value="{{ $users->tanggal_lahir }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com"
                            value="{{ $users->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jeniskelamin" id="jeniskelamin"
                            placeholder="name@example.com" value="{{ $users->jenis_kelamin }}">
                    </div>
                    <div class="mb-3">
                        <label for="noktp" class="form-label">No Ktp</label>
                        <input type="number" class="form-control" name="noktp" id="noktp" value="{{ $users->no_ktp }}">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ $users->foto }}">
                        @if ($users->foto)
                            <img src="{{ asset('storage/' . $users->foto) }}" alt=""
                                class="img-fluid img-preview mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-fluid img-preview mb-3 col-sm-5" alt="">
                        @endif
                        <input type="file" class="form-control  @error('gambar') is-invalid @enderror " name="gambar"
                            id="gambar" onchange="previewImage()">
                        @error('gambar')<div class=" invalid-feedback"> {{ $message }}</div> @enderror
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
