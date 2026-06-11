<?php

namespace Models\CategoriesModel;

use \PDO;

function findAll(PDO $conn): array
{
    $sql = "SELECT *
            FROM types_of_recipes
            ORDER BY name ASC;";
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
