<div class="text-center">
<h1>C'est la page des couleurs</h1>
<?php 
$model = new colorModel();
$colors = $model->getColors();
?>
<?php foreach ($colors as $color): ?>

    <table>
    <tr>
        <td><?php echo $color['NOM_COULEUR']; ?></td>
    </tr>
    </table>
<?php endforeach; 
?>
</div>