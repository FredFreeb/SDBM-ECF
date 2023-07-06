<?php
// views/colors/update.php

echo '<form method="POST" action="update?id=' . $color['ID_COULEUR'] . '">';
echo 'Nom: <input type="text" name="colorName" value="' . $color['NOM_COULEUR'] . '"><br>';
echo '<input type="submit" value="Modifier">';
echo '</form>';
?>
