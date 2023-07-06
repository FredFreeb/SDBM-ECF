////// V2
<?php
echo '<h1>Créer une nouvelle bière</h1>';

// Tableau associatif des noms de champs
$fieldNames = [
    'titrage' => 'Titrage',
    'marqueId' => 'ID de marque',
    'volume' => 'Volume',
    'couleurId' => 'ID de couleur',
    'typeId' => 'ID de type',
    'prixAchat' => 'Prix d\'achat',
    'beerName' => 'Nom de la bière'
];

// Génération du formulaire
echo '<form method="POST" action="create">';
foreach ($fieldNames as $fieldName => $fieldLabel) {
    echo '<label>' . $fieldLabel . '</label>';
    echo '<input type="text" name="' . $fieldName . '" /><br>';
}
echo '<input type="submit" value="Soumettre" />';
echo '</form>';
?>
