<div class="container">
<?php 
$title='Les Couleurs';
if (isset($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>
    <h1>Liste des couleurs existantes</h1>
    <ul>
        <?php foreach ($colors as $color): ?>
            <li><?= $color['NOM_COULEUR'] ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Envie d'une nouvelle couleur, ajoutez-la : </h2>
    <form action="index.php?action=addColor" method="post">
        <input type="text" name="newColor" placeholder="Nouvelle couleur" required>
        <input type="submit" value="Ajouter">
    </form>

</div>
