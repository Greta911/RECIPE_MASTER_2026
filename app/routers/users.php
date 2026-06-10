<?php

include_once '../app/controllers/usersController.php';

switch ($_GET['users']):
    case 'show':
        \App\Controllers\UsersController\showAction($conn, $_GET['id']);
        break;
    default:
        \App\Controllers\UsersController\indexAction($conn);
endswitch;
