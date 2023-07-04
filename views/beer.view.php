<!-- beer.view.php -->
<div class="container text-center">

    <h1>Liste des bières</h1>
    <?php $title = 'Beers'; ?>

    <form action="/beer" method="post">
        <select name="color">
            <option value="">Toutes les couleurs</option>
            <?php foreach ($colors as $color): ?>
                <option value="<?= $color['ID_COULEUR'] ?>" <?= ($selectedColor == $color['ID_COULEUR']) ? 'selected' : '' ?>><?= $color['NOM_COULEUR'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Filtrer">
    </form>

    <h2>Envie d'une nouvelle bière, créez-la : </h2>
        <a class="btn btn-secondary" href="/beer/create">Créer</a>
    
        <div class="table-responsive-max-height">
        <table class="table table-striped">
            <thead>    
                <tr>
                    <th>Nom</th>
                    <th>Volume</th>
                    <th>Marque</th>
                    <th>Couleur</th>
                    <th>Type</th>
                    <th>CLEM</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($beers as $beer): ?>
                <tr>
                    <td><?= $beer['NOM_ARTICLE'] ?></td>
                    <td><?= $beer['VOLUME'], ' cl' ?></td>
                    <td><?= $beer['NOM_MARQUE'] ?></td>
                    <td><?= $beer['NOM_COULEUR'] ?></td>
                    <td><?= $beer['NOM_TYPE'] ?></td>
                    <td>
                        <a class="btn btn-secondary" href="/beer/update">Modifier</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
            </tbody>
    </div>
    </div>
