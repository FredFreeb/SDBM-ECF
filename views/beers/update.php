<h1>Mettre à jour la bière</h1>

<form method="POST" action="/update">
    <input type="hidden" name="articleId" value="<?= $beer['ID_ARTICLE'] ?>">

    <label for="articleName">Nom de la bière :</label>
    <input type="text" name="articleName" value=""><br>

    <label for="color">Couleur :</label>
    <select name="color">
        <?php foreach ($colors as $color): ?>
            <option value="<?= $color['ID_COULEUR'] ?>">
                <?= $color['NOM_COULEUR'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="type">Type :</label>
    <select name="type">
        <?php foreach ($types as $type): ?>
            <option value="<?= $type['ID_TYPE'] ?>">
                <?= $type['NOM_TYPE'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="marque">Marque :</label>
    <select name="marque">
        <?php foreach ($marques as $marque): ?>
            <option value="<?= $marque['ID_MARQUE'] ?>">
                <?= $marque['NOM_MARQUE'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <input type="submit" value="Mettre à jour">
</form>
