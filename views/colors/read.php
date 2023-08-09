<?php

// Vue pour afficher la liste des couleurs
echo '<table class="table table-striped">';
echo '<h1>Liste des couleurs</h1>';
foreach ($colors as $color) {
    echo '<tr>';
    echo '<td>'.$color['ID_COULEUR'] . ': ' . $color['NOM_COULEUR'] . '</td>';
    echo '<td><a class="btn btn-dark " href="colors/update?id=' . $color['ID_COULEUR'] . '">Modifier</a></td>';
    echo '<td><a class="btn btn-danger " href="colors/delete?id=' . $color['ID_COULEUR'] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette couleur ?\')">Supprimer</a></td>';  
    echo '</tr>';
}
echo '</table>';
echo '<a class="btn btn-info " href="colors/create">Ajouter une couleur</a>';

?>