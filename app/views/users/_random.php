<?php

/** @var array $randomUser */
?>
<section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
    <!-- User Info -->
    <div class="flex items-center mb-6">
        <!-- User Avatar -->
        <img
            src="pictures/<?php echo $randomUser['picture']; ?>"
            alt="<?php echo $randomUser['name']; ?>"
            class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4" />

        <!-- User Details -->
        <div>
            <h3 class="text-2xl font-bold"><?php echo $randomUser['name']; ?></h3>
            <p class="text-gray-400">Membre depuis: <?php echo $randomUser['created_at']; ?></p>
            <p class="text-gray-400">Nombre de recettes postées: 10</p>
        </div>
    </div>

    <!-- User Actions -->
    <div class="flex justify-between items-center mb-4">
        <a
            href="?recipes=user&id=<?php echo $randomUser['id']; ?>"
            class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2">Voir mes recettes</a>
    </div>

    <?php include '../app/views/recipes/_latestByUserId.php'; ?>

</section>