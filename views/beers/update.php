<?php

echo '<h1>Mettre à jour la bière</h1>';

echo '<form method="POST" action="/update?id=' . $beer['ID_ARTICLE'] . '">';
    echo '<input type="hidden" name="articleId" value="' . $beer['ID_ARTICLE'] . '">';

    echo '<label for="articleName">Nom de la bière :</label>';
    echo '<input type="text" name="articleName" value="' . $beer['NOM_ARTICLE'] . '"> <br>';

    echo '<label for="color">Couleur :</label>';
    echo '<select name="color">';
    foreach ($colors as $color) {
        echo '<option value="' . $color['ID_COULEUR'] . '">' . $color['NOM_COULEUR'] . '</option>';
    }
    echo '</select><br>';

    echo '<label for="type">Type :</label>';
    echo '<select name="type">';
    foreach ($types as $type) {
        echo '<option value="' . $type['ID_TYPE'] . '">' . $type['NOM_TYPE'] . '</option>';
    }
    echo '</select><br>';

    echo '<label for="marque">Marque :</label>';
    echo '<select name="marque">';
    foreach ($marques as $marque) {
        echo '<option value="' . $marque['ID_MARQUE'] . '">' . $marque['NOM_MARQUE'] . '</option>';
    }
    echo '</select><br>';

    echo '<input type="submit" value="Modifier">';
echo '</form>';
?>
