<div class="modal fade" id="modal-lg{{ $product->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Informations sur le produit {{ $product->nom }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center p-2">
                                    <img class=" profile-user-img img-fluid"
                                        src="
                                    {{ asset(getFilesPath($product->image)) }}
                                    "
                                        alt="product picture" style=" width: 200px; height: 170px;" />
                                </div>


                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>
                                            Nom du produit
                                        </b> <b class="float-right text-muted">
                                            {{ $product->nom }}
                                        </b>
                                    </li>
                                    <li class="list-group-item">
                                        <b>
                                            Prix du produit
                                        </b> <b class="float-right text-muted">
                                            {{ $product->prix }}
                                        </b>
                                    </li>
                                    <li class="list-group-item">
                                        <b>
                                            Categorie du produit
                                        </b> <b class="float-right text-muted">
                                            {{ $product->category->type }}
                                        </b>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                Description du produit
                            </div>
                            <div class="card-body box-profile">
                                <h3 class="text-bold text-lg text-muted">
                                    {{ $product->description }}

                                </h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>
