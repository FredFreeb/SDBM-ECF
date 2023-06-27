<?php

// Inclure le modèle
require_once 'beer.php';


$articles = getBeers();

// Inclure la vue pour afficher les utilisateurs
require_once 'beerView.php';

