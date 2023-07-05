<?php
// views/colors/delete.php
echo 'Êtes-vous sûr de vouloir supprimer cette couleur : ' . $_POST['colorId'] . ' - ' . $_POST['colorName'] . '?<br>';
echo '<form method="POST" action="delete">';
echo '<input type="hidden" name="id" value="' . $_POST['colorId'] . '">';
echo '<input type="submit" value="Supprimer">';
echo '</form>';

?>
