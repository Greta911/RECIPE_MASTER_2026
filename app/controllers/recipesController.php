<?php

namespace App\Controllers\RecipesController;

use \PDO;
use \App\Models\RecipesModel;

function indexAction(PDO $conn)
{
    include_once '../app/models/recipesModel.php';
    $recipes = RecipesModel\findAll($conn);

    global $content, $title;
    $title = "Liste des recettes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $conn, int $id)
{
    include_once '../app/models/recipesModel.php';
    $recipe = RecipesModel\findOneById($conn, $id);

    global $content, $title;
    $title = $recipe['name'];
    ob_start();
    include '../app/views/recipes/show.php';
    $content = ob_get_clean();
}

function userRecipesAction(PDO $conn, int $userId)
{
    include_once '../app/models/recipesModel.php';
    include_once '../app/models/usersModel.php';

    // 1. On récupère les recettes du chef
    $recipes = RecipesModel\findAllByUserIdWithoutLimit($conn, $userId);

    // 2. On récupère les infos du chef pour la vue (son nom, etc.)
    $user = \App\Models\UsersModel\findOneById($conn, $userId);

    global $content, $title;
    $title = "Recettes de " . $user['name'];

    ob_start();
    include '../app/views/recipes/_index.php';
    $content = ob_get_clean();
}
