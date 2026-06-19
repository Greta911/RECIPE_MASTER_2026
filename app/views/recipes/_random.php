<?php

/** @var array $randomRecipe */

?>
<section class="relative mb-6">
    <img
        class="w-full h-96 object-cover"
        src="<?php echo $randomRecipe['picture']; ?>"
        alt="<?php echo $randomRecipe['name']; ?>" />
    <div
        class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent">
        <h1 class="text-3xl font-bold mb-2 text-white">
            <?php echo $randomRecipe['name']; ?>
        </h1>
        <div class="flex items-center mb-4">
            <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
            <span class="text-white"><?php echo number_format($randomRecipe['average_rating'] ?? 0, 1); ?></span>
        </div>
        <p class="text-gray-300 mb-4">
            <?php echo \Core\Helpers\truncate($randomRecipe['description'], 200); ?>
        </p>
        <div class="flex items-center mb-4">
            <span class="text-gray-400 mr-2">Par Jean Dupont</span>
            <span class="text-gray-500"><i class="fas fa-comment"></i> <?php echo $randomRecipe['nb_comments']; ?> <?php echo $randomRecipe['nb_comments'] > 1 ? 'commentaires' : 'commentaire'; ?></span>
        </div>
        <a
            href="?recipes=show&id=<?php echo $randomRecipe['id']; ?>"
            class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
            Voir la recette
        </a>
    </div>
</section>