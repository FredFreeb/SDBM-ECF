Pour commencer recharger dans le terminal composer update

Puis dans config.php dans les modèles si mac décommenté les lignes de socket et dans les models alterner les lien pdo


schéma:

index.php
styles.css
router.php

-models:
    -beer.model.php
    -color.model.php
    -config.php
    -image.model.php

-views:
    -beers:
        -create.php
        -read.php
        -update.php
        -delete.php
    -colors:
        -create.php
        -read.php
        -update.php
        -delete.php
    -home.view.php
    -layout.php
  
controllers:
    -beer.controller.php
    -color.controller.php
    -home.controller.php
vendor:
    -composer
    -twbs
    -autoload.php
composer.json
composer.lock
script.js
readme.txt