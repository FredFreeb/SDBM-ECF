<div class="text-center">
    <?php 
    $title = 'Accueil';
    ?>
    <h1>Bienvenue au SDBM</h1>

</div>
<!-- Dans votre fichier views/home.view.php -->
<div id="beerCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicateurs -->
    <ol class="carousel-indicators">
    <?php for ($i = 0; $i < count($randomBeers); $i++): ?>
        <li data-bs-target="#beerCarousel" data-bs-slide-to="<?php echo $i; ?>" <?php echo ($i === 0) ? 'class="active"' : ''; ?>></li>
    <?php endfor; ?>
    </ol>

    <!-- Slides -->
    <div class="carousel-inner">
    <?php foreach ($randomBeers as $index => $beer): ?>
        <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
        <?php if (!empty($beer['image'])): ?>
            <img src="<?php echo $beer['image']; ?>" class="d-block w-100" alt="Beer Image">
        <?php else: ?>
            <img class="max-height" src="https://raw.githubusercontent.com/FredFreeb/assets/myPortfolio/enCours.png"></img>
        <?php endif; ?>

        <div class="carousel-caption text-bg-dark">
            <h3><?php echo $beer['NOM_ARTICLE']; ?></h3>
            <p><?php echo $beer['NOM_MARQUE']; ?></p>
        </div>
        </div>
    <?php endforeach; ?>
    </div>

    <!-- Contrôles -->
    <a class="carousel-control-prev" href="#beerCarousel" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#beerCarousel" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </a>
    </div>