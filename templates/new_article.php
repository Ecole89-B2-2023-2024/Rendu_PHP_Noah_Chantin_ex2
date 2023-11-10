<main>
    <form class="m-5" action="#" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title">
            <label for="content" class="form-label">Contenu</label>
            <textarea class="form-control" type="text" id="content" name="content" contenteditable></textarea>
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
    //var_dump($_POST);
    $erreur = [];
    $message = [];
    // var_dump($message);
    // var_dump($erreur);
    //print_r($_SERVER);
    if ($erreur == []) {
        require("./inc/db.php");

        $request = $pdo->prepare("INSERT INTO article (title, content, publishdate, author) VALUES (?, ?, ?, ?);");
        $request->execute([$_POST['title'], $_POST['content'], date("Y-m-d H:i:s"), $_POST['author']]);
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