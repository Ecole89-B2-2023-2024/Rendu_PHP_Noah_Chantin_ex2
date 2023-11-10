<?php
require("./templates/header.php");
require("./inc/db.php");
$sql = "SELECT * FROM `article` WHERE title LIKE \"%" . $_GET['criteria'] . "%\" OR content LIKE \"%" . $_GET['criteria'] . "%\"; ";
$request = $pdo->query($sql);
$postsList = $request->fetchAll(PDO::FETCH_ASSOC);
if ($_GET['criteria'] == "") {
    $postsList = [];
}
?>
<style>
    .toudou {
        word-break: break-all;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }
</style>
<main class="d-flex flex-wrap">
    <?php
    if ($postsList != [] || $postsList != null):
        foreach ($postsList as $post) {
            ?>
            <article class="col-6 border border-secondary p-5 m-1">
                <h2>
                    <?= $post['title'] ?>
                </h2>
                <p class="toudou">
                    <?= $post['content'] ?>
                </p>
                <p>Publié le :
                    <?= $post['publishdate'] ?> par
                    <?= ucfirst($post['author']) ?>
                </p>
            </article>
            <?php
        }
    else:
        echo "<h2>Pas de résultat pour cette recherche</h2>";
    endif;
    ?>
</main>
<?php
require("./templates/footer.php");