<?php

namespace App\Controllers\RecipesController;

use \PDO;
use \App\Models\RecipesModel;


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
