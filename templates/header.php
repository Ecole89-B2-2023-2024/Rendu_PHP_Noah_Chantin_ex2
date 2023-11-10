<?php
session_start()
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Exercice php</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./liste_article.php">liste des article</a>
                        </li>
                        <?php if (!isset($_SESSION["username"])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./register.php">Inscription</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./connexion.php">Connexion</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./new_article.php">Ecrire un article</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./logout.php">Déconnexion</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="me-5">
                        <?php
                        if (isset($_SESSION["username"])) {
                            echo "Bienvenue " . ucfirst($_SESSION["username"]) . "vous êtes connecté en tant que " . $_SESSION['role'];
                        }
                        ?>
                    </div>
                    <form class="d-flex" role="search" action="./liste_resultat.php">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="criteria">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>