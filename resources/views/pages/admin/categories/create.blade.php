@extends('layouts.admin')
@section('page-header')
@include('partials.page-header', [
'head' => 'Ajout d une categorie',
'title' => 'Categorie',
'subtitle' => 'Ajout',
'url' => 'admin/category',
])
@endsection
@section('content')
@include('partials.notifications')
<div class="col-md-6 offset-md-1 p-2">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Formulaire d'ajout d'une categorie
            </h3>
        </div>
        <form method="POST" action="{{route('category.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">
                        Type de categorie
                    </label>
                    <input type="text" name="type" class="form-control" id="exampleInputEmail1" placeholder="Enter le type" value="{{ old('type') }}">
                    @error('type')
                    <span style="margin-top: 10px;"  class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        Description de la categorie
                    </label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Entrer la decription ..." value="{{ old('description') }}"></textarea>
                    @error('description')
                    <span style="margin-top: 10px;" class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
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
