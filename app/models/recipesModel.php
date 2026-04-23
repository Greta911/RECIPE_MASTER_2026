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
