@extends('layouts.app.app')
@section('page-header')
    @include('partials.page-header', [
        'head' => 'Listes des produits de la categorie' . ' ' . $products->first()->category->type,
        'title' => 'Categories',
        'subtitle' => 'Details',
        'url' => 'category',
    ]);
@endsection
@section('content')
    <div class="container-fluid">
        <h2 class="text-center display-4">
            Rechercher un produit
        </h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('search.product', $products[0]->category_id) }}" method="post" id="search_product">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here"
                            id="query" name="search">
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
        <div class="row" id="products">
            @foreach ($products as $product)
                <div class="card mr-5" style="width: 18rem;">
                    <div class="card-header pb-1">

                        <h5 class="card-title">
                            Nom : <span
                                class="text-lg text-bold text-uppercase">{{ formatProductName($product->nom) }}</span>
                        </h5>

                    </div>



                    <img src="{{ asset(getFilesPath($product->image)) }}" class="card-img-top" alt="..."
                        style="width: 250px; height: 170px; margin: 0 auto; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <p class="card-text">
                                {{ $product->description }}
                            </p>
                            <a href="#" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-lg{{ $product->id }}">
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

        </div>
    </div>
@endsection
