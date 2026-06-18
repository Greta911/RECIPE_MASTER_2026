<?php

namespace App\Models\CommentsModel;

use \PDO;

function findAllByRecipeId(PDO $conn, int $recipeID): array
{
    $sql = "SELECT *, u.name AS author_name, u.picture AS author_picture
            FROM comments c
            INNER JOIN users u ON c.user_id = u.id
            WHERE c.recipe_id = :recipeID
            ORDER BY c.created_at DESC;";

    $rs = $conn->prepare($sql);  // RecordsSet
    $rs->bindValue(':recipeID', $recipeID, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function countByRecipeId(PDO $conn, int $recipeID): int
{
    $sql = "SELECT COUNT(*) 
            FROM comments 
            WHERE recipe_id = :recipeID;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':recipeID', $recipeID, PDO::PARAM_INT);
    $rs->execute();

    //fetchColumn(0) permet de récupérer directement le chiffre du COUNT
    return (int)$rs->fetchColumn();
}
