<?php

/** @var array $popularRecipes */
?>
<section>
    <h2 class="text-2xl font-bold mb-4">Recettes populaires</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Recipe Card -->
        <?php foreach ($popularRecipes as $recipe): ?>
            <article
                class="bg-white rounded-lg overflow-hidden shadow-lg relative">
                <img
                    class="w-full h-48 object-cover"
                    src="<?php echo $recipe['picture']; ?>"
                    alt="Recipe Image" />
                <div class="p-4">
                    <h3 class="text-xl font-bold mb-2"><?php echo $recipe['name']; ?></h3>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                        <span>4.5</span>
                    </div>
                    <p class="text-gray-600"><?php echo \Core\Helpers\truncate($recipe['description'], 50); ?></p>
                    <div class="flex items-center mt-4">
                        <span class="text-gray-700 mr-2">Par Marie Durand</span>
                        <span class="text-gray-500"><i class="fas fa-comment"></i> 8 commentaires</span>
                    </div>
                    <a
                        href="recipe.html"
                        class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                        Voir la recette
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>