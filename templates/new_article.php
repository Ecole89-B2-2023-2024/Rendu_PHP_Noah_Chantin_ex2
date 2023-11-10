<main>
    <form class="m-5" action="#" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title">
            <label for="content" class="form-label">Contenu</label>
            <textarea cols="30" rows="10" class="form-control" id="content" name="content"></textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Auteur</label>
            <input type="author" class="form-control" id="author" name="author">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
    var_dump($_POST);
    $erreur = [];
    $message = [];
    // test titre
    if (isset($_POST['title']) && preg_match('/[a-z]+$/', $_POST['title'])) {
        array_push($message, 'ok pour le titre');
    } else {
        array_push($erreur, 'Le titre n\'est pas valide');
    }
    // test contenu
    if (isset($_POST['content']) && preg_match('/[a-z0-0.?,;:! ]+$/', $_POST['content'])) {
        array_push($message, 'ok pour le contenu');
    } else {
        array_push($erreur, 'Le contenu n\'est pas valide');
    }
    // test author
    if (isset($_POST['author']) && preg_match('/[a-z]+$/', $_POST['author'])) {
        array_push($message, 'ok pour l\'auteur');
    } else {
        array_push($erreur, 'L\'auteur n\'est pas valide');
    }
    // var_dump($message);
// var_dump($erreur);
    if ($erreur == []) {
        require("./inc/db.php");

        $date_publication = date("Y-m-d H:i:s");
        $request = $pdo->prepare("INSERT INTO article (title, content, publishdate, author) VALUES (?, ?, ?, ?);");
        $request->execute([$_POST['title'], $_POST['content'], $date_publication, $_POST['author']]);
    }

    ?>
    <ul>
        <?php
        foreach ($message as $value) {
            echo "<li>" . $value . "</li>";
        }
        ?>
    </ul>
    <ul>
        <?php
        foreach ($erreur as $item) {
            echo "<li>" . $item . "</li>";
        }
        ?>
    </ul>
</main>