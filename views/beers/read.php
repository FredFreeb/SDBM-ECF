<h1>Liste des bières</h1>
<?php
$title = 'Beers';

echo '<form action="/index.php/beers" method="post">';
echo '    <select name="couleurId">';
echo '        <option value="">Toutes les couleurs</option>';
foreach ($colors as $color) {
    echo '<option value="' . $color['ID_COULEUR'] . '">' . $color['NOM_COULEUR'] . '</option>';
}
echo '</select>';

echo '<label for="typeID">Type :</label>';
echo '  <select name="typeId">';
echo '      <option value="">Tous les types</option>';
foreach ($types as $type) {
    echo '<option value="' . $type['ID_TYPE'] . '">' . $type['NOM_TYPE'] . '</option>';
}
echo '</select>';

echo '<label for="marqueId">Marque :</label>';
echo '  <select name="marqueId">';
echo '      <option value="">Toutes les marques</option>';
foreach ($marques as $marque) {
    echo '<option value="' . $marque['ID_MARQUE'] . '">' . $marque['NOM_MARQUE'] . '</option>';
}
echo '</select>';

echo '    <input type="submit" value="Filtrer">';
echo '</form>';
?>

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
                <td><a class="btn btn-dark" href="beers/update?id=<?= $beer['ID_ARTICLE'] ?>">Modifier</a></td>
                <td><a class="btn btn-danger" href="beers/delete?id=<?= $beer['ID_ARTICLE'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette bière ?')">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<a class="btn btn-info" href="beers/create">Ajouter une bière</a>

