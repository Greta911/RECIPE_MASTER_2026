<?php

/** @var array $recipes */

?>

<section>
    <h2 class="text-2xl font-bold mb-4"><?php echo $title; ?></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Recipe Card -->
        <?php foreach ($recipes as $recipe): ?>
            <article
                class="bg-white rounded-lg overflow-hidden shadow-lg relative">
                <img
                    src="<?php echo $recipe['picture']; ?>"
                    alt="Recipe Image"
                    class="w-full h-48 object-cover" />
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-xl font-bold mb-2"><?php echo $recipe['name']; ?></h3>
                        <span class="text-sm text-gray-500 flex items-center bg-gray-100 px-2 py-1 rounded-full">
                            <i class="fas fa-comment mr-1 text-gray-400"></i>
                            <?php echo $recipe['nb_comments']; ?>
                        </span>
                    </div>

                    <div class="flex items-center mb-2">
                        <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                        <span><?php echo number_format($recipe['average_rating'], 1); ?></span>
                    </div>
                    <p class="text-gray-600">
                        <?php echo \Core\Helpers\truncate($recipe['description'], 50); ?>
                    </p>
                    <a
                        href="?recipes=show&id=<?php echo $recipe['id']; ?>"
                        class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">Voir la recette</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>