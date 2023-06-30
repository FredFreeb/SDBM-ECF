<!DOCTYPE html>
<html lang="fr">
<head>
<title><?php echo @$title; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/styles.css">
</head>
<body>

    <div class="container-fluid text">
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:3000/index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:3000/index.php/beer">Bières</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:3000/index.php/color">Les parfums</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

