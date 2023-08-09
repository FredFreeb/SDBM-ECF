<?php
// Vue pour mettre à jour une couleur
echo '<form method="POST" action="/index.php/colors/update?id=' . $color['ID_COULEUR'] . '">';
echo 'Nom: <input type="text" name="colorName" value="' . $color['NOM_COULEUR'] . '"><br>';
echo '<input type="submit" value="Modifier">';
echo '</form>';
?>
