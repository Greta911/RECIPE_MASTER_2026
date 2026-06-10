<?php

namespace App\Models\UsersModel;

use \PDO;

function findOneByRand(PDO $conn): array
{
    $sql = "SELECT *
            FROM users
            ORDER BY RAND()
            LIMIT 1;";
    $rs = $conn->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function findAll(PDO $conn): array
{
    $sql = "SELECT *
            FROM users
            ORDER BY created_at ASC;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id): array
{
    $sql = "SELECT *
            FROM users 
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}
