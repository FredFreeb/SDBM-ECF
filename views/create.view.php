<h2>Envie d'une nouvelle bière, créez-la : </h2>
<form action="/update-beer/<?= $beer['ID_ARTICLE'] ?>" method="post">
    <label for="name">Nom de l'article :</label>
    <input type="text" name="name" value="">

    <label for="price">Prix d'achat :</label>
    <input type="text" name="price" value="">

    <label for="volume">Volume :</label>
    <select name="volume">
        <?php foreach ($volumes as $volume): ?>
            <option value='<?= $volume ?>' ><?= $volume,' cl' ?></option>
        <?php endforeach; ?>
    </select>

    <label for="brandId">Marque :</label>
    <select name="brandId">
        <?php foreach ($marques as $marque): ?>
            <option value="<?= $marque['ID_MARQUE'] ?>"><?= $marque['NOM_MARQUE'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="colorId">Couleur :</label>
    <select name="colorId">
        <?php foreach ($colors as $color): ?>
            <option value="<?= $color['ID_COULEUR'] ?>" ><?= $color['NOM_COULEUR'] ?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" value="Modifier">
</form>
