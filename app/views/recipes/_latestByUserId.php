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
                    <h5 class="text-lg font-bold mb-2"><?php echo $recipe['name'] ?></h5>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                        <span>4.5</span>
                    </div>
                    <p class="text-gray-500">
                        <?php echo \Core\Helpers\truncate($recipe['description'], 50) ?>
                    </p>
                    <a
                        href="recipe_detail.html"
                        class="text-yellow-500 hover:text-yellow-600 mt-2 inline-block">Voir la recette</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</div>