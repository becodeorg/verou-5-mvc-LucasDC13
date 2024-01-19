<?php require 'View/includes/header.php'?>

<?php // Use any data loaded in the controller here ?>

<section>
    <h1><?= $article->title ?></h1>
    <p><?= $article->formatPublishDate() ?></p>
    <p><?= $article->description ?></p>

    <?php // TODO: links to next and previous ?>
    <?php if($article->id===1) : ?> 
        <a href='index.php?page=articles'>All articles</a>
    <?php else : ?>
        <a href='index.php?page=articles-show&id=<?=$article->id-1?>'>Previous article</a>
    <?php endif; ?>

    <?php if($article->id===3) : ?>
        <a href='index.php?page=articles'>All articles</a>
    <?php else : ?>
        <a href='index.php?page=articles-show&id=<?=$article->id+1?>'>Next article</a>
    <?php endif; ?>
</section>

<?php require 'View/includes/footer.php'?>

