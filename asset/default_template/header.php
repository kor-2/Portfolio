<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />

    <title>Portfolio Heckmann Corenin Developpeur Web junior</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-nav sticky-top">
        <a class="navbar-brand text-light" href="/">HECKMANN CORETIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-light" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/index.php#portfolio">Portfolio </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/index.php#info">Info</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/index.php#contact">Contact</a>
                </li>


                <?php if (isset($_SESSION['user'])) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/compte.php"><?= $_SESSION['user']['pseudo'];?></a>
                </li>



                <?php }else { ?>


                <li class="nav-item active">
                    <a class="nav-link" href="/register.php">S'inscrire</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/login.php">Se connecter</a>
                </li>



                <?php }?>



            </ul>
        </div>
    </nav>