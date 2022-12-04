@extends('layouts.app.app')
@section('page-header')
@include('partials.page-header', [
'head' => 'Listes des produits',
'title' => 'Produits',
'subtitle' => 'Liste',
'url' => 'products',
])
@endsection
@section('content')
<div class="container-fluid">
    <h2 class="text-center display-4">
        Rechercher un produit
    </h2>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route ('product.search')}}" method="post" id="search-product">
                <div class="input-group">
                    <input type="search" class="form-control form-control-lg" placeholder="Entrer le nom du produit" id="q" name="search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid p-5">
    <div class="row" id="posts">
        @foreach ($products as $product)
        <div class="card mr-5" style="width: 18rem;">
            <img src="{{ asset('assets/dist/img/avatar.png')}}" class="card-img-top" alt="..." style="width: 150px; height: 150px; margin: 0 auto;">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $product->nom }}
                </h5>
                <p class="card-text">
                    {{ $product->description }}
                </p>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg{{$product->id}}">
                    Voir plus
                </a>
                @include('modals.show_product', [
                'id' => $product->id,
                'nom' => $product->nom,
                'description' => $product->description,
                'image' => $product->image,
                ])
            </div>
        </div>
        @endforeach
        @include('modals.show_product', [
        'id' => $product->id,
        'nom' => $product->nom,
        'description' => $product->description,
        'image' => $product->image,
        ])
    </div>
</div>
@endsection
