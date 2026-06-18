<?php

namespace Models\IngredientsModel;

use \PDO;

function findAllWithRecipesCount(PDO $conn): array
{
    $sql = "SELECT i.*, COUNT(rhi.recipe_id) AS nb_recipes
            FROM ingredients i
            LEFT JOIN recipes_has_ingredients rhi ON i.id = rhi.ingredient_id
            GROUP BY i.id
            ORDER BY i.name ASC;";
    return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id): array
{
    $sql = "SELECT *
            FROM ingredients
            WHERE id = :id;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
