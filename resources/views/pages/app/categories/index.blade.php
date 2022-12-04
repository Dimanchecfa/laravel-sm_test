@extends('layouts.app.app')
@section('page-header')
    @include('partials.page-header', [
        'head' => 'Listes des categories',
        'title' => 'Categories',
        'subtitle' => 'Liste',
        'url' => 'category',
    ])
@endsection

@section('content')
    <div class="container-fluid">
        <h2 class="text-center display-4">
            Rechercher une categorie
        </h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('category.search') }}" method="POST" id="search_category">
                    <div class=" input-group">
                        <input type="search" class="form-control form-control-lg" placeholder="Enter le type de la categorie"
                            id="category" name="search" />
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
        <div class="card card-solid ">
            <div class="card-body pb-0">
                <div class="row" id="categories">
                    @foreach ($categories as $category)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">

                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="lead text-underline"><b class="">
                                                    Type :
                                                </b>
                                                <span class="text-bold text-lg">
                                                    {{ $category->type }}
                                                </span>

                                            </p>
                                            <p class="lead"><b>
                                                    Nombre de produits:
                                                </b>
                                                <span class="text-bold text-lg">
                                                    {{ getCategoryProductNumber($category->id) }}
                                                </span>

                                            </p>
                                            <p class="lead"><b>
                                                    Prix total:
                                                </b>
                                                <span class="text-bold text-lg">
                                                    {{ getCategoryProductPrice($category->id) }} F CFA
                                                </span>
                                            </p>

                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{ asset(getFilesPath($category->image)) }}" alt="user-avatar"
                                                class="img-fluid" style="width : 200px; height: 170px">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="{{ route('category.product', $category->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i> Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer -->
        </div>
    </div>
@endsection
