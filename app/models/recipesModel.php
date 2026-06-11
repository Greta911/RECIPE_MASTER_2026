<?php

namespace App\Models\RecipesModel;

use \PDO;

function findOneByRand(PDO $conn): array
{
    $sql = "SELECT *
            FROM recipes
            ORDER BY RAND()
            LIMIT 1;";
    $rs = $conn->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id): array
{
    $sql = "SELECT *
            FROM recipes 
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function findAllPopulars(PDO $conn): array
{

    $sql = "SELECT *
            FROM recipes
            ORDER BY created_at DESC
            LIMIT 3;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByUserId(PDO $conn, int $userID): array
{
    $sql = "SELECT *
            FROM recipes r
            WHERE user_id = :userID
            LIMIT 3;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':userID', $userID, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByUserIdWithoutLimit(PDO $conn, int $userID): array
{
    $sql = "SELECT *
            FROM recipes r
            WHERE user_id = :userID;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':userID', $userID, PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetchAll(PDO::FETCH_ASSOC);
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
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
function findAll(PDO $conn): array
{
    $sql = "SELECT *
            FROM recipes
            ORDER BY created_at ASC;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}
