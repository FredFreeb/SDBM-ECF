<h1>Créer une nouvelle bière</h1>

<form method="POST" action="create">
    <label>Nom de la bière</label>
    <input type="text" name="beerName" /><br>
    
    <label>Titrage</label>
    <input type="text" name="titrage" /><br>
    
    <label>Volume</label>
    <input type="text" name="volume" /><br>
    
    <label>Prix d'achat</label>
    <input type="text" name="prixAchat" /><br>
    
    <label>Fabricant</label>
    <select name="marqueId">
        <?php foreach ($marques as $marque): ?>
            <option value="<?= $marque['ID'] ?>"><?= $marque['NOM'] ?></option>
        <?php endforeach; ?>
    </select><br>
    
    <label>Couleur</label>
    <select name="couleurId">
        <?php foreach ($colors as $color): ?>
            <option value="<?= $color['ID'] ?>"><?= $color['NOM'] ?></option>
        <?php endforeach; ?>
    </select><br>
    
    <label>Type de bières</label>
    <select name="typeId">
        <?php foreach ($types as $type): ?>
            <option value="<?= $type['ID'] ?>"><?= $type['NOM'] ?></option>
        <?php endforeach; ?>
    </select><br>
    
    <input type="submit" value="Soumettre" />
</form>
