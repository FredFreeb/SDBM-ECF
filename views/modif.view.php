<div class="modal fade" id="modal<?= $beer['ID_ARTICLE'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?= $beer['ID_ARTICLE'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel<?= $beer['ID_ARTICLE'] ?>">Modifier la bière</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/beer/update" method="post">
                    <input type="hidden" name="beerId" value="<?= $beer['ID_ARTICLE'] ?>">
                    <label for="name">Nom :</label>
                    <input type="text" name="name" value="<?= $beer['NOM_ARTICLE'] ?>">
                    <button type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
