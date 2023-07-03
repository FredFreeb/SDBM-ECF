<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Modifier une bière</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/index.php/beer/update">
                    <input type="hidden" name="beerId" id="beerId">
                    <div class="form-group">
                        <label for="newName">Nouveau nom :</label>
                        <input type="text" class="form-control" id="newName" name="newName" placeholder="Nouveau nom">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>