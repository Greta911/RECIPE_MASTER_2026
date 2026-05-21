<?php

/** @var array $recipe */
?>
<section class="bg-white rounded-lg shadow-lg p-6 mb-6">
    <!-- Recipe Image -->
    <img
        class="w-full h-96 object-cover rounded-t-lg"
        src="<?php echo $recipe['picture']; ?>"
        alt="Nom de la recette" />

    <!-- Recipe Info -->
    <div class="p-4">
        <h1 class="text-3xl font-bold mb-4"><?php echo $recipe['name']; ?></h1>
        <div class="flex items-center mb-4">
            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
            <span>4.9</span>
            <span class="ml-4 text-gray-700"><i class="fas fa-clock"></i> <?php echo $recipe['prep_time']; ?></span>
        </div>
        <p class="text-gray-700 mb-4">
            Description détaillée de la recette. Cette recette est parfaite
            pour les occasions spéciales, les dîners en famille ou tout
            simplement pour se faire plaisir.
        </p>
        <div class="flex items-center mb-4">
            <span class="text-gray-700 mr-2">Par <?php echo $recipe['user_id']; ?></span>
            <span class="text-gray-500"><i class="fas fa-comment"></i> 12 commentaires</span>
        </div>
    </div>

    <!-- Ingredients -->
    <div class="p-4 border-t">
        <h2 class="text-2xl font-bold mb-4">Ingrédients</h2>
        <ul class="list-disc pl-5">
            <li>200g de farine</li>
            <li>100g de sucre</li>
            <li>3 œufs</li>
            <!-- ... (autres ingrédients) ... -->
        </ul>
    </div>

    <!-- Comments -->
    <div class="p-4 border-t">
        <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
        <!-- Comment -->
        <div class="mb-4">
            <div class="flex items-center mb-2">
                <img
                    src="https://source.unsplash.com/50x50/?portrait"
                    alt="Nom de l'utilisateur"
                    class="w-10 h-10 rounded-full mr-2" />
                <span class="font-bold">Marie Durand</span>
            </div>
            <p class="text-gray-700">
                J'ai adoré cette recette ! Merci pour le partage.
            </p>
        </div>
        <!-- ... (autres commentaires) ... -->
    </div>
</section>