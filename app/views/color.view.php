<div class="text-center">
    <h1>C'est la page des couleurs</h1>
    <?php 
    $model = new colorModel();
    $colors = $model->getColors();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['newColor'])) {
            $newColor = $_POST['newColor'];
            $model->createColor($newColor);
        }
    }
    ?>

    <table>
        <?php foreach ($colors as $color): ?>
        <tr>
            <td><?php echo $color['NOM_COULEUR']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <form method="POST">
        <input type="text" name="newColor" placeholder="Nouvelle couleur">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
