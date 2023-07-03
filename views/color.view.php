<div class="container">
    <h1>Liste des couleurs</h1>
    <ul>
        <?php foreach ($colors as $color): ?>
            <li><?= $color['NOM_COULEUR'] ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Ajouter une nouvelle couleur</h2>
    <form action="addColor.php" method="post">
        <input type="text" name="newColor" placeholder="Nouvelle couleur" required>
        <input type="submit" value="Ajouter">
    </form>

</div>
