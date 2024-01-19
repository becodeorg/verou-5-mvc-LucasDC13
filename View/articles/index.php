<?php require 'View/includes/header.php'?>

<?php // Use any data loaded in the controller here ?>

<section>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li>
                <h1><?= $article->title ?></h1>
                <p>Published on <?= $article->formatPublishDate() ?></p>
                <a href="index.php?page=articles-show&id=<?= $article->id ?>">Show article</a>
            </li>

        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'?>