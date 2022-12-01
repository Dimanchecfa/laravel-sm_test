@extends('layouts.admin')
@section('page-header')
@include('partials.page-header', [
'head' => 'Ajout d un produit',
'title' => 'Produits',
'subtitle' => 'Ajout',
'url' => 'admin/product',
])
@endsection
@section('content')
@include('partials.notifications')
<div class="col-md-6 offset-md-1">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Formulaire d'ajout d un produit
            </h3>
        </div>
        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">
                        Nom du produit
                    </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrer le nom du produit" name="nom" value="{{ old('nom') }}">
                    @error('nom')
                    <span style="margin-top: 10px;" class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        Description du produit
                    </label>
                    <textarea class="form-control" rows="4" placeholder="Entrer la decription ..." name="description" value="{{ old('description') }}"></textarea>
                </div>
                <div class="form-group">
                    <label>
                        Selectionner une categorie
                    </label>
                    <select class="form-control select2" style="width: 100%;">
                        @foreach ($categorie as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->type }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">
                        Image du produit
                    </label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image" value="{{ old('image') }}">
                            <label class="custom-file-label" for="exampleInputFile">
                                Choisir une image
                            </label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>


</div>


@endsection
