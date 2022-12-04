@extends('layouts.admin.admin')
@section('page-header')
    @include('partials.page-header', [
        'head' => 'Listes des categories',
        'title' => 'Categories',
        'subtitle' => 'Liste',
        'url' => 'admin/category',
    ])
@endsection



@section('content')
    @include('partials.notifications')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Liste des categories
                </h3>
                <div class="card-tools">
                    <a type="button" class="btn btn-primary" href="{{ route('category.create') }}">

                        <i class="fas fa-plus"></i>
                        Ajouter une categorie
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%" class="text-center">
                                Type de categorie
                            </th>
                            <th style="width: 20%" class="text-center">
                                Quantite
                            </th>
                            <th class="text-center" style="width: 20%">
                                Prix total (FCFA)
                            </th>

                            <th style="width: 20%" class="text-center">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    {{ $category->type }}
                                </td>
                                <td class="text-center">
                                    {{ getCategoryProductNumber($category->id) }}
                                </td>
                                <td class="text-center">
                                    {{ getCategoryProductPrice($category->id) }}
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('category.show', $category->id) }}">
                                        <i class="fas fa-eye">
                                        </i>
                                        View
                                    </a>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#modal-default{{ $category->id }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                    @include('modals.delete_category', [
                                        'value' => $category,
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
