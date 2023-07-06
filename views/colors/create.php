<?php
// views/colors/create.php
echo '<h1>Créer une nouvelle couleur</h1>';
echo '<form method="POST" action="/index.php/colors/create">';
echo 'Nom: <input type="text" name="colorName"><br>';
echo '<input type="submit" value="Ajouter">';
echo '</form>';

?>
