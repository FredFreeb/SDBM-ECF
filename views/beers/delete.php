<?php
echo 'Êtes-vous sûr de vouloir supprimer cet article : ' . $articleId . ' - ' . $articleName . '?<br>';
echo '<form method="POST" action="/index.php/beers/delete?id=' . $articleId . '">';
echo '<input type="submit" value="Supprimer">';
echo '</form>';
?>
