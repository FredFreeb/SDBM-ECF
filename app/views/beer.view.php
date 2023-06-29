<div class="text-center">
<?php 
$model = new beerModel();
$beers = $model->getBeers();
?>
<h1>C'est la page des bières</h1>
<?php foreach ($beers as $beer): ?>
<table>
<tr>
    <td><?php echo $beer['NOM_MARQUE'],'/'; ?></td>
    <td><?php echo $beer['NOM_ARTICLE'],'/'; ?></td>
    <td><?php echo $beer['NOM_TYPE'],'/'; ?></td>
    <td><?php echo $beer['NOM_COULEUR'],'/'; ?></td>
    <td><?php echo $beer['VOLUME'], ' cl'; ?></td>
</tr>
</table>
<?php endforeach; 
?>
</div>