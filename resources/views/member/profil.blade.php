@extends('layout.main')
@section('container')
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"> 
            <button class="btn btn-secondary"> 
                <img src={{ asset('storage/' . $user->foto) }}" height="100" width="100" />
            </button> 
            <span class="name mt-3">{{$user->nama}}</span> 
            <span class="idd"> {{$user->email}} <i class="fa fa-copy"></i> </span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                <span class="idd1">{{$user->no_ktp}}</span>
            </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                <span class="number">1069</span> 
            </div>
            <div class=" d-flex mt-2"> 
                <a href="/member/{{$user->id}}/edit" class="btn btn-primary">Edit Profile</a> 
            </div>
            <div class=" d-flex mt-2"> 
                <form action="{{ $user->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <a href="#" class=""></a>
                                    <button type="submit" class="btn btn-danger">Hapus Akun</button>
                                </form>
            </div>
        </div>
    </div>
</div>
@endsection
