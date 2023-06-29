<div class="text-center">
    <?php 
    $model = new beerModel();
    $beers = $model->getBeers();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['beerId']) && isset($_POST['newName'])) {
            $beerId = $_POST['beerId'];
            $newName = $_POST['newName'];
            $model->updateBeer($beerId, $newName);
        }
    }
    ?>
    <h1>C'est la page des bières</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Marque</th>
                    <th>Article</th>
                    <th>Type</th>
                    <th>Couleur</th>
                    <th>Volume</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($beers as $beer): ?>
                <tr>
                    <td><?php echo $beer['NOM_MARQUE']; ?></td>
                    <td><?php echo $beer['NOM_ARTICLE']; ?></td>
                    <td><?php echo $beer['NOM_TYPE']; ?></td>
                    <td><?php echo $beer['NOM_COULEUR']; ?></td>
                    <td><?php echo $beer['VOLUME']; ?> cl</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $beer['ID_ARTICLE']; ?>">Modifier</button>
                    </td>
                </tr>
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
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
