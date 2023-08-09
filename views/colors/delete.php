<?php
// Vue pour confirmer la suppression d'une couleur
echo 'Êtes-vous sûr de vouloir supprimer cet article : ' . $colorId . ' - ' . $colorName . '?<br>';
echo '<form method="POST" action="/index.php/colors/delete?id=' . $colorId . '">';
echo '<input type="submit" value="Supprimer">';
echo '</form>';

?>

