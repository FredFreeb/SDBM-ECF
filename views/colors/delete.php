<?php

echo 'Êtes-vous sûr de vouloir supprimer cet article : ' . $colorId . ' - ' . $colorName . '?<br>';
echo '<form method="POST" action="/beers/delete?id=' . $colorId . '">';
echo '<input type="submit" value="Supprimer">';
echo '</form>';
?>

?>
