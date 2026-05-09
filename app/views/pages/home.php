<!--SECTION RANDOM RECIPE-->
<?php include '../app/views/recipes/_random.php'; ?>
<!--SECTION POPULAR RECIPES-->
<?php include '../app/views/recipes/_populars.php'; ?>

<!--SECTION RANDOM AUTHOR AVEC SES RECIPES-->
<section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">

    <?php include '../app/views/users/_random.php'; ?>

    <!-- User's Latest Recipes -->
    <?php include '../app/views/recipes/_latestByUserId.php'; ?>
</section>