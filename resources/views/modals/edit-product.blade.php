<div class="modal fade" id="modal-xl{{ $value->id }}">
    <div class="modal-dialog modal-xl">
        <form action="{{ route('update.product', $value->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Modifier les informations du produit {{ $value->nom }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">


                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Formulaire d' edition d'une categorie
                                    </h3>
                                </div>

                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">
                                                Nom du produit
                                            </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Entrer le nom du produit" name="nom"
                                                value="{{ $product->nom }}">
                                            @error('nom')
                                                <span style="margin-top: 10px;" class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">
                                                Prix du produit
                                            </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Entrer le prix du produit" name="prix"
                                                value="{{ $product->prix }}">
                                            @error('prix')
                                                <span style="margin-top: 10px;" class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Description du produit
                                            </label>
                                            <textarea class="form-control" rows="4" placeholder="Entrer la decription ..." name="description"
                                                value="{{ $product->description }}">{{ $product->description }}</textarea>
                                            @error('description')
                                                <span style="margin-top: 10px;" class="text-danger">
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
                                                    <input type="file" class="custom-file-input"
                                                        id="exampleInputFile" name="image"
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
                                </div>

                            </div>


                        </div>
                        <div class="col-md-5 offset-md-1">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Image du produit
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <img src="{{ asset(getFilesPath($category->image)) }}" alt=""
                                        class="img-fluid" style="width : 200px; height: 200px" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Fermer
                    </button>
                    <button type="submit" class="btn btn-danger" id="btn-submit">
                        Enregistrer
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
