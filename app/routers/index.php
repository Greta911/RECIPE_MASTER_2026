<?php


include_once "../app/controllers/recipesController.php";
//ROUTE PAR DEFAUT
//PATTERN: /recipes=show&id=x
//CTRL: recipesController
//ACTION: show

if (isset($_GET['recipes'])):
    //ROUTE RECETTES 
    include_once "../app/routers/recipes.php";
//ROUTE USERS
elseif (isset($_GET['users'])):
    include_once "../app/routers/users.php";
//ROUTE PAR DEFAUT
//PATTERN: /
//CTRL: PagesController (composite)
//ACTION: pages/home
else:
    include_once "../app/controllers/pagesController.php";
    \App\Controllers\PagesController\homeAction($conn);

endif;
