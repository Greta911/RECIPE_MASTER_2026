<?php

namespace Models\CategoriesModel;

use \PDO;

function findAllWithRecipesCount(PDO $conn): array
{
    $sql = "SELECT tor.*, COUNT(r.id) AS nb_recipes
            FROM types_of_recipes tor
            LEFT JOIN recipes r ON tor.id = r.type_id
            GROUP BY tor.id
            ORDER BY tor.name ASC;";
    return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id): array
{
    $sql = "SELECT *
            FROM types_of_recipes
            WHERE id = :id;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
