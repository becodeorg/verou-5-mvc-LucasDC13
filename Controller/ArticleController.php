<?php

declare(strict_types = 1);
require_once "config.php";

class ArticleController
{
    public $databaseManager; 

    public function __construct($databaseManager){
        $this->databaseManager = $databaseManager;
    } 

    public function index()
    {
        $articles = $this->getArticles();
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        $query = "SELECT * FROM articles";
        $statement = $this->databaseManager->connection->prepare($query);
        $statement->execute(); 
        $rawArticles = $statement->fetchAll();

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
        $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date'], $rawArticle['id']);
        }

        return $articles;
    }

    public function show()
    {
        $article = $this->getArticleById();
        require 'View/articles/show.php';
    }

    public function getArticleById()
    {
        $query = "SELECT * FROM articles WHERE id = ?";
        $statement = $this->databaseManager->connection->prepare($query);
        $getData = [$_GET['id']];
        $statement->execute($getData);
        $rawArticle = $statement->fetchAll()[0];

        $specificArticle = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date'], $rawArticle['id']);
        return $specificArticle;
    }
}