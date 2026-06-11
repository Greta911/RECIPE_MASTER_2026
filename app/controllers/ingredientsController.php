<?php

namespace App\Controllers\IngredientsController;

use \PDO;

function showAction(PDO $conn, int $ingredientID)
{
    include_once '../app/models/ingredientsModel.php';
    $ingredient = \Models\IngredientsModel\findOneById($conn, $ingredientID);

    include_once '../app/models/recipesModel.php';
    $recipes = \App\Models\RecipesModel\findAllByIngredientId($conn, $ingredientID);

    global $content, $title;
    $title = "Recettes avec : " . $ingredient['name'];
    ob_start();
    include '../app/views/ingredients/show.php';
    $content = ob_get_clean();
}
