<?php

/** @var array $recipes */
/** @var array $user */
?>
<!-- Recipe Card (Repeat for each recipe) -->
<?php
// On donne à la variable attendue par le partial le tableau de toutes les recettes du chef
$userLatestRecipes = $recipes;
?>

<?php include '../app/views/recipes/_latestByUserId.php'; ?>