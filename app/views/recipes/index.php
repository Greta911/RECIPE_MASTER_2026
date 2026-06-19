<?php

/** @var array $recipes */
/** @var array $totalPages */
/** @var array $currentPage */

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
                        <span><?php echo number_format($recipe['average_rating'] ?? 0, 1); ?></span>
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
    <!--PAGINATION-->
    <?php if ($totalPages > 1): ?>
        <div class="w-full clear-both flex justify-center items-center space-x-2 my-12">

            <?php if ($currentPage > 1): ?>
                <a href="?recipes=index&page=<?php echo (int)$currentPage - 1; ?>"
                    class="px-4 py-2 border rounded-md text-gray-600 hover:bg-gray-100 transition inline-block">
                    Préc
                </a>
            <?php else: ?>
                <span class="px-4 py-2 border border-gray-200 rounded-md text-gray-400 bg-gray-100 cursor-not-allowed inline-block select-none">
                    Préc
                </span>
            <?php endif; ?>

            <?php foreach (range(1, (int)$totalPages) as $i): ?>
                <?php if ($i == $currentPage): ?>
                    <span class="px-4 py-2 border border-gray-800 rounded-md bg-gray-800 text-white font-bold inline-block">
                        <?php echo $i; ?>
                    </span>
                <?php else: ?>
                    <a href="?recipes=index&page=<?php echo $i; ?>"
                        class="px-4 py-2 border rounded-md text-gray-600 bg-white hover:bg-gray-100 transition inline-block">
                        <?php echo $i; ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if ($currentPage < $totalPages): ?>
                <a href="?recipes=index&page=<?php echo $currentPage + 1; ?>"
                    class="px-4 py-2 border rounded-md text-gray-600 bg-white hover:bg-gray-100 transition inline-block">
                    Next
                </a>
            <?php else: ?>
                <span class="px-4 py-2 border border-gray-200 rounded-md text-gray-400 bg-gray-100 cursor-not-allowed inline-block select-none">
                    Next
                </span>
            <?php endif; ?>

        </div>
    <?php endif; ?>
</section>