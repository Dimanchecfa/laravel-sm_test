@extends('layouts.admin')
@section('page-header')


@include('partials.page-header' ,[
'head' => 'Profile',
'title' => 'admin',
'subtitle' => 'profile',
'url' => 'admin/category',
])



@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('assets/dist/img/user4-128x128.jpg')}}" alt="User profile picture" />
                    </div>

                    <h3 class="profile-username text-center">
                        {{ Auth::user()->name }}
                    </h3>


                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>
                                Nom
                            </b> <a class="float-right">
                                DImanche
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>
                                Prenom
                            </b> <a class="float-right">
                                DImanche
                            </a>
                        </li>
                        <li class="list-group-item">
                            <b>
                                Email
                            </b> <a class="float-right">
                                DImanche
                            </a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>
                            Changer de photo de profile
                        </b></a>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2 card-primary">
                    <ul class="nav nav-pills">

                        <li class="nav-item">
                            <a class="nav-item active" href="#settings" data-toggle="tab">
                                Modifier le profile
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">


                        <div class="active tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">
                                        Nom
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Nom" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">
                                        Prenom
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" placeholder="Prenom" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

@endsection
