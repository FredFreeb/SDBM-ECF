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

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
