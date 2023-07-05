<table class="table table-striped">
<?php
// views/color/index.php

foreach ($colors as $color) {
    echo '<tr>';
    echo '<td>'.$color['ID_COULEUR'] . ': ' . $color['NOM_COULEUR'] . '</td>';
    echo '<td><a class="btn btn-dark " href="colors/update?id=' . $color['ID_COULEUR'] . '">Modifier</a></td>';
    echo '<td><a class="btn btn-danger " href="colors/delete?id=' . $color['ID_COULEUR'] . '">Supprimer</a></td>';  
    echo '</tr>';
}


?>
</table>

<?php echo '<a class="btn btn-info " href="colors/create">Ajouter une couleur</a>'; ?>