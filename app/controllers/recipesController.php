<?php

namespace App\Controllers\RecipesController;

use \PDO;
use \App\Models\RecipesModel;

function indexAction(PDO $conn)
{
    include_once '../app/models/recipesModel.php';
    // 1. On définit combien de recettes on veut par page
    $limit = 6;
    // 2. On récupère le numéro de la page depuis l'URL (?page=2). Si la page n'est pas définie ou n'est pas un nombre, on se met sur la page 1 par défaut.
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($currentPage < 1) {
        $currentPage = 1;
    }
    // 3. On calcule l'OFFSET (combien de recettes on doit sauter)
    $offset = ($currentPage - 1) * $limit;
    // 4. On récupère UNIQUEMENT les 6 recettes de la page actuelle
    $recipes = RecipesModel\findAll($conn, $limit, $offset);
    // 5. Calcul du nombre total de pages
    $totalRecipes = RecipesModel\countAll($conn);
    // ceil() permet d'arrondir au nombre supérieur (ex: 13 recettes / 6 = 2.16 -> donc 3 pages)
    $totalPages = (int)ceil($totalRecipes / $limit);

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

    include_once '../app/models/commentsModel.php';
    $comments = \App\Models\CommentsModel\findAllByRecipeId($conn, $id);

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

//SEARCHBAR

function searchAction(PDO $conn)
{
    // 1. On inclut le modèle des recettes 
    include_once '../app/models/recipesModel.php';

    // 2. On récupère la chaîne de recherche envoyée par l'URL (ex: ?q=tarte+pomme)
    $searchQuery = $_GET['q'] ?? '';

    // 3. On appelle notre fonction de recherche du modèle (Elle gère déjà le découpage par mots et le nombre de commentaires)
    $recipes = \App\Models\RecipesModel\search($conn, $searchQuery);

    // 4. On prépare les variables globales pour le template (layout)
    global $content, $title;
    $title = "Résultats de recherche pour : " . $searchQuery;

    // 5. On charge la vue pour afficher les résultats
    ob_start();
    include '../app/views/recipes/index.php'; // On réutilise la même vue que la liste globale 
    $content = ob_get_clean();
}
