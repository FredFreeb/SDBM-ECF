<?php
echo '<h1>Liste des bières</h1>';
$title = 'Beers';
?>

<form action="/index.php/beers" method="post">
    <select name="color">
        <option value="">Toutes les couleurs</option>
        <?php foreach ($colors as $color): ?>
            <option value="<?= $color['ID_COULEUR'] ?>"><?= $color['NOM_COULEUR'] ?></option>
        <?php endforeach; ?>
    </select>

    <select name="type">
        <option value="">Tous les types</option>
        <?php foreach ($types as $type): ?>
            <option value="<?= $type['ID_TYPE'] ?>"><?= $type['NOM_TYPE'] ?></option>
        <?php endforeach; ?>
    </select>

    <select name="brand">
        <option value="">Toutes les marques</option>
        <?php foreach ($brands as $brand): ?>
            <option value="<?= $brand['ID_MARQUE'] ?>"><?= $brand['NOM_MARQUE'] ?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" value="Filtrer">
</form>

<div class="table-responsive-max-height">
    <table class="table table-striped">
        <?php foreach ($beers as $beer): ?>
            <tr>
                <td><?= $beer["ID_ARTICLE"] ?></td>
                <td><?= $beer["NOM_ARTICLE"] ?></td>
                <td><?= $beer["VOLUME"] ?> cl</td>
                <td><?= $beer["NOM_MARQUE"] ?></td>
                <td><?= $beer["NOM_COULEUR"] ?></td>
                <td><?= $beer["NOM_TYPE"] ?></td>
                <td><a class="btn btn-dark " href="beers/update?id=<?= $beer['ID_ARTICLE'] ?>">Modifier</a></td>
                <td><a class="btn btn-danger " href="beers/delete?id=<?= $beer['ID_ARTICLE'] ?>">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<a class="btn btn-info " href="beers/create">Ajouter une bière</a>
