<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//include all your model files here
require 'Model/Article.php';
//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/ArticleController.php';
require 'Core/DatabaseManager.php';

// Get the current page to load
// If nothing is specified, it will remain empty (home should be loaded)
$page = $_GET['page'] ?? null;

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

// Load the controller
// It will *control* the rest of the work to load the page
switch ($page) {
    case 'articles':
        // This is shorthand for:
        // $articleController = new ArticleController;
        // $articleController->index();
        (new ArticleController($databaseManager))->index();
        break;
    case 'articles-show':
        (new ArticleController($databaseManager))->show();
        break;
    case 'home':
    default:
        (new HomepageController())->index();
        break;
}