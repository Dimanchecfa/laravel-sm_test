@extends('layouts.admin.admin')
@section('page-header')
    @include('partials.page-header', [
        'head' => 'Profile',
        'title' => 'admin',
        'subtitle' => 'profile',
        'url' => 'admin/category',
    ])
@endsection
@section('content')
    @include('partials.notifications')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <form class="form" method="POST" action="{{ route('update.info') }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Modifier les informations de l'utilisateur
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">
                                    Nom
                                </label>
                                <input type="text" id="inputName" class="form-control"
                                    value={{ getUserConnected()->nom }} name="nom">
                                @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">
                                    Prenom
                                </label>
                                <input type="text" id="inputClientCompany" class="form-control"
                                    value={{ getUserConnected()->prenom }} name="prenom" />
                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">
                                    Email
                                </label>
                                <input type="email" id="inputProjectLeader" class="form-control"
                                    value={{ getUserConnected()->email }} name="email" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </form>
                <!-- /.card -->
            </div>
            <div class="col-md-6">

                <form class="form" method="POST" action="{{ route('update.password') }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Modifier du mot de passe
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">
                                    Ancien mot de passe
                                </label>
                                <input type="password" id="inputName" class="form-control" value="{{ old('old_password') }}"
                                    name="old_password" />
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputClientCompany">
                                    Nouveau mot de passe
                                </label>
                                <input type="password" id="inputClientCompany" class="form-control"
                                    value="{{ old('password') }}" name="password" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputProjectLeader">
                                    Confirmer le mot de passe
                                </label>
                                <input type="password" id="inputProjectLeader" class="form-control"
                                    value="{{ old('password_confirmation') }}" name="password_confirmation" />
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- /.col -->
    </div>


    <!-- /.row -->
    </div>
@endsection
