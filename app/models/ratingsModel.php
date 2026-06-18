<?php

namespace App\Models\RatingsModel;

use \PDO;

function getAverageRating(PDO $conn, int $recipeId)
{
    $sql = "SELECT AVG(value) AS average_rating 
            FROM ratings 
            WHERE recipe_id = :id;";
    $rs = $conn->prepare($sql);
    $rs->execute([':id' => $recipeId]);

    $row = $rs->fetch(PDO::FETCH_ASSOC);

    // On retourne la note arrondie à 1 chiffre après la virgule, ou null si pas de note
    return $row ? $row['average_rating'] : null;
}
