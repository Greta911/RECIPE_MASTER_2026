<?php


namespace App\Controllers\PagesController;


use \PDO;
use \App\Models\RecipesModel;
use \App\Models\UsersModel;


function homeAction(PDO $conn)
{
    include_once '../app/models/recipesModel.php';
    include_once '../app/models/usersModel.php';
    $randomRecipe = RecipesModel\findOneByRand($conn);
    $allPopular = RecipesModel\findAllPopulars($conn);
    $popularRecipes = array_slice($allPopular, 0, 3);
    $randomUser = UsersModel\findOneByRand($conn);
    $userLatestRecipes = RecipesModel\findAllByUserId($conn, $randomUser['id']);

    global $title, $content;
    $title = "Home";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
