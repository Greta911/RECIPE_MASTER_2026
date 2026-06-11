<?php

namespace Models\IngredientsModel;

use \PDO;

function findAll(PDO $conn): array
{
    $sql = "SELECT *
            FROM ingredients
            ORDER BY name ASC;";
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
