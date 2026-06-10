<?php

namespace App\Controllers\UsersController;

use \PDO;
use \App\Models\UsersModel;

function indexAction(PDO $conn)
{
    include_once '../app/models/usersModel.php';
    $users = UsersModel\findAll($conn);

    include_once '../app/models/recipesModel.php';

    global $content, $title;
    $title = "Liste des Chefs";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $conn, int $id)
{
    include_once '../app/models/usersModel.php';
    $user = UsersModel\findOneById($conn, $id);

    global $content, $title;
    $title = $user['name'];
    ob_start();
    include '../app/views/users/show.php';
    $content = ob_get_clean();
}
