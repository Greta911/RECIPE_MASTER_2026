<?php

namespace App\Controllers\CategoriesController;

use \PDO;

function showAction(PDO $conn, int $typeID)
{
    include_once '../app/models/categoriesModel.php';
    $type = \Models\CategoriesModel\findOneById($conn, $typeID);

    include_once '../app/models/recipesModel.php';
    $recipes = \App\Models\RecipesModel\findAllByTypeId($conn, $typeID);

    global $content, $title;
    $title = "Recettes de la catégorie : " . $type['name'];
    ob_start();
    include '../app/views/categories/show.php';
    $content = ob_get_clean();
}
