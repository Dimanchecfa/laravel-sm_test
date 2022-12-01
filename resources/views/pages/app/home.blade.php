@extends('layouts.app')

@section('content')
<div class="container-fluid p-5">
    <div class="row">
        <div class="card mr-5" style="width: 18rem;">
            <img src="{{ asset('assets/dist/img/avatar.png')}}" class="card-img-top" alt="..." style="width: 150px; height: 150px; margin: 0 auto;">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">
                    Voir plus
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
