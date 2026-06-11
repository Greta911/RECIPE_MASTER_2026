<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    case 'show':
        RecipesController\showAction($conn, $_GET['id']);
        break;
    case 'user':
        // Une fonction à ajouter dans recipesController pour lister les recettes d'un utilisateur spécifique
        RecipesController\userRecipesAction($conn, (int)$_GET['id']);
        break;
    default:
        RecipesController\indexAction($conn);
endswitch;
