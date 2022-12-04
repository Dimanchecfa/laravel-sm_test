@extends('layouts.admin.admin')
@section('page-header')
    @include('partials.page-header', [
        'head' => 'Edition d un produit',
        'title' => 'Produits',
        'subtitle' => 'Edition',
        'url' => 'admin/products',
    ])
@endsection
@section('content')
    @include('partials.notifications')
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Formulaire d'edition d un produit
                    </h3>
                </div>
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nom du produit
                            </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Entrer le nom du produit" value="{{ $product->nom }}" name="nom">
                            @error('nom')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Prix du produit
                            </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Entrer le nom du produit" value="{{ $product->prix }}" name="prix">
                            @error('prix')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>
                                Description du produit
                            </label>
                            <textarea class="form-control" rows="4" placeholder="Entrer la decription ..." name="description" value="">{{ $product->description }}</textarea>
                            @error('description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>
                                Selectionner une categorie
                            </label>
                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                @foreach ($categories as $category)
                                    <option @if ($category->id == $product->categorie_id) selected @endif value="{{ $category->id }}">
                                        {{ $category->type }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categorie_id')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">
                                Image du produit
                            </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image"
                                        value="{{ $product->image }}">
                                    <label class="custom-file-label" for="exampleInputFile">
                                        Choisir une image
                                    </label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('image')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            Modifier
                        </button>
                    </div>
                </form>
            </div>


        </div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Image du produit
                    </h3>
                </div>
                <div class="card-body">
                    <img src="{{ asset(getFilesPath($product->image)) }}" alt="" class="img-fluid"
                        style="width : 200px; height: 200px" />
                </div>
            </div>
        </div>
    </div>
@endsection
