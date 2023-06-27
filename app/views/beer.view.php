<!DOCTYPE html>
<html>
<head>
    <title>Liste des bierres</title>
</head>
<body>
    <h1>Liste des bierres</h1>
    <table>
        <tr>
            <th>Marque</th>
            <th>Nom</th>
        </tr>
        <?php foreach ($beers as $beer): ?>
            <tr>
                <td><?php echo $beer['ID_MARQUE']; ?></td>
                <td><?php echo $beer['NOM_ARTICLE']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>