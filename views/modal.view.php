<!-- Modal -->
<div class="modal fade" id="modal<?php echo $beer['ID_ARTICLE']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?php echo $beer['ID_ARTICLE']; ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel<?php echo $beer['ID_ARTICLE']; ?>">Modifier <?php echo $beer['NOM_MARQUE']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" name="beerId" value="<?php echo $beer['ID_ARTICLE']; ?>">
                    <div class="form-group">
                        <label for="newName<?php echo $beer['ID_ARTICLE']; ?>">Nouveau nom :</label>
                        <input type="text" class="form-control" id="newName<?php echo $beer['ID_ARTICLE']; ?>" name="newName" placeholder="Nouveau nom">
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>