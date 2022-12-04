<div class="modal fade" id="modal-default{{$value->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('category.destroy', $value->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">
                        Suppression de la categorie {{ $value->type}}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px;">
                        Voulez-vous vraiment supprimer la categorie <span style="font-weight: bold;">{{ $value->type}}</span> ?
                        La suppression de cette categorie entrainera la suppression de tous les produits de cette categorie.
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
