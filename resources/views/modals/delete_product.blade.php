<div class="modal fade" id="modal-default{{$value->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('product.destroy', $value->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">
                        Suppression du produit {{ $value->nom}}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Voulez-vous vraiment supprimer le produit {{ $value->nom}} ?
                        Cette action est irreversible.
                        &hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Fermer
                    </button>
                    <button type="submit" class="btn btn-danger">
                        Supprimer
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
