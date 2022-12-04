@extends('layouts.admin.admin')
@section('page-header')
    @include('partials.page-header', [
        'head' => 'Edition d une categorie',
        'title' => 'Categorie',
        'subtitle' => 'Edition',
        'url' => 'admin/category',
    ])
@endsection
@section('content')
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Formulaire d' edition d'une categorie
                    </h3>
                </div>
                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Type de categorie
                            </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Entrer le type de categorie" value="{{ $category->type }}" name="type">
                            @error('type')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">
                                Image de categorie
                            </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile"
                                        value="{{ $category->image }}" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">
                                        Choisir une image
                                    </label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        Upload
                                    </span>
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
                        Image de la categorie
                    </h3>
                </div>
                <div class="card-body">
                    <img src="{{ asset(getFilesPath($category->image)) }}" alt="" class="img-fluid"
                        style="width : 200px; height: 200px" />
                </div>
            </div>
        </div>
    </div>
@endsection
