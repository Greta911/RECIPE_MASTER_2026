<?php

/** @var array $userLatestRecipes */
?>
<div>
    <h4
        class="text-xl font-bold mb-4 border-b-2 border-yellow-500 pb-2">
        Mes dernières recettes
    </h4>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Recipe Card (Repeat for each recipe) -->
        <?php foreach ($userLatestRecipes as $recipe): ?>
            <article
                class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative">
                <img
                    src="<?php echo $recipe['picture']; ?>"
                    alt="<?php echo $recipe['name'] ?>"
                    class="w-full h-48 object-cover" />
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h5 class="text-lg font-bold mb-2 text-white"><?php echo $recipe['name'] ?></h5>
                        <span class="text-sm text-gray-500 flex items-center bg-gray-100 px-2 py-1 rounded-full">
                            <i class="fas fa-comment mr-1 text-gray-400"></i>
                            <?php echo $recipe['nb_comments']; ?>
                        </span>
                    </div>

                    <div class="flex items-center mb-2">
                        <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                        <span><?php echo number_format($recipe['average_rating'] ?? 0, 1); ?></span>
                    </div>
                    <p class="text-gray-500">
                        <?php echo \Core\Helpers\truncate($recipe['description'], 50) ?>
                    </p>
                    <a
                        href="?recipes=show&id=<?php echo $recipe['id']; ?>"
                        class="text-yellow-500 hover:text-yellow-600 mt-2 inline-block">Voir la recette</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</div>