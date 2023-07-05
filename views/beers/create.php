<h1>Créer une nouvelle bière</h1>

<form method="POST" action="/index.php/beers/create?id=">
    <label for='beerName'>Nom de la bière :</label>
    <input type="text" name='beerName'><br<h1>Créer une nouvelle bière</h1>

<form method="POST" action="/create">
    <label for="beerName">Nom de la bière :</label>
    <input type="text" name="beerName"><br>

    <label for="couleurId">Couleur :</label>
    <select name="couleurId">
        <?php foreach ($colors as $color): ?>
            <option value="<?= $color['ID_COULEUR'] ?>"><?= $color['NOM_COULEUR'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="typeId">Type :</label>
    <select name="typeId">
        <?php foreach ($types as $type): ?>
            <option value="<?= $type['ID_TYPE'] ?>"><?= $type['NOM_TYPE'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="prixAchat">Prix d'achat :</label>
    <input type="text" name="prixAchat"><br>

    <label for="titrage">Titrage :</label>
    <input type="text" name="titrage"><br>

    <label for="marqueId">Marque :</label>
    <select name="marqueId">
        <?php foreach ($marques as $marque): ?>
            <option value="<?= $marque['ID_MARQUE'] ?>"><?= $marque['NOM_MARQUE'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="volume">Volume :</label>
    <select name="volume">
        <?php foreach ($volumes as $volume): ?>
            <option value="<?= $volume ?>"><?= $volume, ' cl' ?></option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" value="Ajouter">
</form>
