<?php

//ROUTE PAR DEFAUT
//PATTERN: /
//CTRL: PagesController (composite)
//ACTION: pages/home

include_once "../app/controllers/pagesController.php";
\App\Controllers\PagesController\homeAction($conn);
