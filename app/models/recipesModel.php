<?php

namespace App\Models\RecipesModel;

use \PDO;

include_once '../app/models/commentsModel.php';
include_once '../app/models/ratingsModel.php';

// Helper pour gérer les commentaires partout où besoin
function attachWithCommentsCount(PDO $conn, array $recipes): array
{
    include_once '../app/models/ratingsModel.php';

    // On réutilise array_map 
    return array_map(function ($recipe) use ($conn) {
        $recipe['nb_comments'] = \App\Models\CommentsModel\countByRecipeId($conn, $recipe['id']);
        $recipe['average_rating'] = \App\Models\RatingsModel\getAverageRating($conn, $recipe['id']);
        return $recipe;
    }, $recipes);
}
function findOneByRand(PDO $conn): array
{
    $sql = "SELECT *
            FROM recipes
            ORDER BY RAND()
            LIMIT 1;";
    $rs = $conn->query($sql);
    $recipe =  $rs->fetch(PDO::FETCH_ASSOC);
    if ($recipe) {
        $recipe['nb_comments'] = \App\Models\CommentsModel\countByRecipeId($conn, $recipe['id']);
        $recipe['average_rating'] = \App\Models\RatingsModel\getAverageRating($conn, $recipe['id']);
    }

    return $recipe;
}

function findOneById(PDO $conn, int $id): array
{
    $sql = "SELECT *
            FROM recipes 
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $recipe =  $rs->fetch(PDO::FETCH_ASSOC);
    if ($recipe) {
        $recipe['nb_comments'] = \App\Models\CommentsModel\countByRecipeId($conn, $recipe['id']);
    }

    return $recipe;
}

function findAllPopulars(PDO $conn): array
{

    $sql = "CALL GetPopularRecipes();";
    $rs = $conn->query($sql);
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    return attachWithCommentsCount($conn, $recipes);
}
//Regrouper ces deux fonctions en une seule 
function findAllByUserId(PDO $conn, int $userID): array
{
    $sql = "SELECT *
            FROM recipes r
            WHERE user_id = :userID
            LIMIT 3;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':userID', $userID, PDO::PARAM_INT);
    $rs->execute();
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    return attachWithCommentsCount($conn, $recipes);
}

function findAllByUserIdWithoutLimit(PDO $conn, int $userID): array
{
    $sql = "SELECT *
            FROM recipes r
            WHERE user_id = :userID;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':userID', $userID, PDO::PARAM_INT);
    $rs->execute();
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    return attachWithCommentsCount($conn, $recipes);
}

function findAllByTypeId(PDO $conn, int $typeID): array
{
    $sql = "SELECT *
            FROM recipes
            WHERE type_id = :typeID
            ORDER BY name ASC;";

    $rs = $conn->prepare($sql);  // RecordsSet
    $rs->bindValue(':typeID', $typeID, PDO::PARAM_INT);
    $rs->execute();
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    return attachWithCommentsCount($conn, $recipes);
}

function findAllByIngredientId(PDO $conn, int $ingredientID): array
{
    $sql = "SELECT *
            FROM recipes r
            INNER JOIN recipes_has_ingredients rhi ON r.id = rhi.recipe_id
            WHERE rhi.ingredient_id = :ingredientID
            ORDER BY name ASC;";

    $rs = $conn->prepare($sql);  // RecordsSet
    $rs->bindValue(':ingredientID', $ingredientID, PDO::PARAM_INT);
    $rs->execute();
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    return attachWithCommentsCount($conn, $recipes);
}
function findAll(PDO $conn): array
{
    $sql = "SELECT *
            FROM recipes
            ORDER BY created_at ASC;";
    $rs = $conn->query($sql);
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    return attachWithCommentsCount($conn, $recipes);
}

//Fonction search pour la searchbar
function search(PDO $conn, string $searchQuery): array
{
    // 1. Nettoyage rapide et découpage en mots
    $searchCleaned = preg_replace('/\s+/', ' ', trim($searchQuery));
    if ($searchCleaned === '') return [];
    $words = explode(' ', $searchCleaned);
    // 2. Construction ultra-simple des conditions SQL
    $conditions = [];
    $params = [];
    foreach ($words as $i => $word) {
        $conditions[] = "(name LIKE :w$i OR description LIKE :w$i)";
        $params[":w$i"] = '%' . $word . '%';
    }
    // 3. Préparation et exécution 
    $sql = "SELECT * 
            FROM recipes 
            WHERE " . implode(' OR ', $conditions) .
        " ORDER BY created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->execute($params);
    // 4. On récupère et on injecte le nombre de commentaires
    return attachWithCommentsCount($conn, $rs->fetchAll(PDO::FETCH_ASSOC));
}
