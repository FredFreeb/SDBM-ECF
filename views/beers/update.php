<?php

echo '<h1>Mettre à jour la bière</h1>';

echo '<form method="POST" action="/index.php/beers/update?id=' . $beer['ID_ARTICLE'] . '">';
    echo '<input type="hidden" name="articleId" value="' . $beer['ID_ARTICLE'] . '">';

    echo '<label for="beerName">Nom de la bière :</label>';
    echo '<input type="text" name="beerName" value="' . $beer['NOM_ARTICLE'] . '"> <br>';
    
    echo '<label>Titrage</label>';
    echo '<input type="text" name="titrage" value="' . $beer['TITRAGE'] . '"><br>';
    
    echo '<label>Volume</label>';
    echo '<input type="text" name="volume" value="' . $beer['VOLUME'] . '"><br>';
    
    echo '<label>Prix achat</label>';
    echo '<input type="text" name="prixAchat" value="' . $beer['PRIX_ACHAT'] . '"><br>';
    
    echo '<label for="couleurId">Couleur :</label>';
    echo '<select name="couleurId">';
    foreach ($colors as $color) {
        echo '<option value="' . $color['ID_COULEUR'] . '">' . $color['NOM_COULEUR'] . '</option>';
    }
    echo '</select><br>';

    echo '<label for="typeID">Type :</label>';
    echo '<select name="typeId">';
    foreach ($types as $type) {
        echo '<option value="' . $type['ID_TYPE'] . '">' . $type['NOM_TYPE'] . '</option>';
    }
    echo '</select><br>';

    echo '<label for="marqueId">Marque :</label>';
    echo '<select name="marqueId">';
    foreach ($marques as $marque) {
        echo '<option value="' . $marque['ID_MARQUE'] . '">' . $marque['NOM_MARQUE'] . '</option>';
    }
    echo '</select><br>';

    echo '<input type="submit" value="Modifier">';
echo '</form>';
?>
