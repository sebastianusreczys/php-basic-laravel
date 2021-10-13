@extends('layout.main')
@section('container')
    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-2">
                <img src="" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->nama }}</h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
    </div>
@endsection
