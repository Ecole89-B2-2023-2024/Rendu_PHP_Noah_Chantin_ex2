<?php
require("./templates/header.php");
require("./inc/db.php");
$sql = "SELECT * FROM `article`;";
$request = $pdo->query($sql);
$postsList = $request->fetchAll(PDO::FETCH_ASSOC);
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
    ?>
</main>
<?php
require("./templates/footer.php");