<div class="modal fade" id="modal-lg{{ $value->id }}">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <form action="{{ route('add.product', $value->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">
                        Ajouter un produit dans la categorie {{ $value->type }}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nom du produit
                            </label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Entrer le nom du produit" name="nom" value="{{ old('nom') }}">
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
                                placeholder="Entrer le prix du produit" name="prix" value="{{ old('prix') }}">
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
                                value="{{ old('description') }}"></textarea>
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
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image"
                                        value="{{ old('image') }}">
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
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Fermer
                    </button>
                    <button type="submit" class="btn btn-danger" id="btn-submit">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
