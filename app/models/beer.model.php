<?php
    function getBeers() {
        $pdo = new PDO('mysql:host=localhost;dbname=sdbm_v2','root','');
        $requete = $pdo->query('SELECT NOM_ARTICLE, VOLUME, ID_MARQUE, ID_COULEUR, ID_TYPE FROM article');
        $beers = $requete -> fetchAll(PDO::FETCH_ASSOC);
        return $beers;
    }