@extends('layouts.admin.admin')
@section('page-header')
@include('partials.page-header', [
'head' => 'Listes des produits',
'title' => 'Produits',
'subtitle' => 'Liste',
'url' => 'admin/products',
])
@endsection
@section('content')
@include('partials.notifications')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Liste des Produis
            </h3>
            <div class="card-tools">
                <a type="button" class="btn btn-primary" href="{{route('product.create')}}">

                    <i class="fas fa-plus"></i>
                    Ajouter un un produit
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
                            Categorie
                        </th>
                        <th style="width: 20%" class="text-center">
                            Nom du produit
                        </th>
                        <th class="text-center" style="width: 20%">
                            Description
                        </th>
                        <th class="text-center" style="width: 20%">
                            Prix du produit (FCFA)
                        </th>

                        <th style="width: 20%" class="text-center">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td class="text-center">
                            {{
                            $loop->iteration
                            }}
                        </td>
                        <td class="text-center">
                            {{
                               getCategoryType($product->category_id)
                           }}
                        </td>
                        <td class="text-center">
                            {{
                            $product->nom
                           }}
                        </td>
                        <td class="text-center">
                            {{
                            $product->description
                            }}
                        </td>
                        <td class="text-center">
                            {{
                            $product->prix
                            }}
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg{{$product->id}}"> <i class=" fas fa-eye">
                                </i>
                                View
                            </a>
                            <a href="{{
                            route('product.edit', $product->id)
                            }}" class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default{{$product->id}}">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>

                        </td>
                    </tr>
                    @include('modals.delete_product', [
                    'value' => $product,
                    ])




                    @include('modals.show_product', [
                    'id' => $product->id,
                    'nom' => $product->nom,
                    'description' => $product->description,
                    'image' => $product->image,
                    ])
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>


@endsection
