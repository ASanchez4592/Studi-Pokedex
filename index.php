<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Pokedex-Studi</title>
</head>

<body>

    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./images/logo.png" alt="Logo Pokédex">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Types</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Chercher" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Chercher</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <?php
    require './PokemonsManager.php';
    $manager = new PokemonsManager();

    require './ImagesManager.php';
    $imagesManager = new ImagesManager;

    $pokemons = $manager->getAll();

    ?>

    <main class="container">
    <section class="d-flex flex-wrap justify-content-center">
        <?php foreach ($pokemons as $pokemon): ?>
            <?php $imagesManager->get($pokemon->getImage()); ?>
            <div class="card m-5" style="width: 18rem;">
                <img src="<?= $imagesManager
                    ->get($pokemon->getImage())
                    ->getPath() ?>" class="card-img-top" alt="<?= $pokemon->getName() ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $pokemon->getNumber() ?># <?= $pokemon->getName() ?></h5>
                    <p class="card-text"><?= $pokemon->getDescription() ?></p>
                    <a href="./update.php?id=<?= $pokemon->getId() ?>" class="btn btn-warning">Modifier</a>
                    <a href="./delete.php?id=<?= $pokemon->getId() ?>" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
        <a href="./create.php" class="btn btn-success">Ajouter un Pokémon</a>
    </main>

</body>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>