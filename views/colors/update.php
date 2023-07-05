<?php
// views/personnes/edit.php

echo '<form method="POST" action="update?id=' . $color['ID_COULEUR'] . '">';
echo 'Nom: <input type="text" name="nom" value="' . $color['nom'] . '"><br>';
echo '<input type="submit" value="Modifier">';
echo '</form>';
?>
