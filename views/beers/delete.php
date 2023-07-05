<?php
// views/beers/delete.php

echo 'Êtes-vous sûr de vouloir supprimer cette article : ' . $articleId['articleId'] . ' - ' . $articleId['articleName'] . '?<br>';
echo '<form method="POST" action="delete?id=' . $articleId['articleId'] . '">';
echo '<input type="submit" value="Supprimer">';
echo '</form>';
?>
