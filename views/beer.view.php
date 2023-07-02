<div class="text-center">
    <h1>C'est la page des bières</h1>
    <?php 
        $title = 'Beers';
    ?>
<form method="POST">
    <label for="beerColorFilter">Filtrer par Couleur :</label>
    <select id="beerColorFilter" name="beerColorFilter">
        <option value="">Toutes les couleurs</option>
        <?php foreach ($colors as $color): ?>
            <option value="<?php echo $color['NOM_COULEUR']; ?>"><?php echo $color['NOM_COULEUR']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="filterButton">Filtrer</button>
</form>



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