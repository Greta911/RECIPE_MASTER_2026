<?php

/** @var array $recipe */
/** @var array $comments */
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
            <span><?php echo number_format($recipe['average_rating'], 1); ?></span>
            <span class="ml-4 text-gray-700"><i class="fas fa-clock"></i> <?php echo $recipe['prep_time']; ?></span>
        </div>
        <p class="text-gray-700 mb-4">
            <?php echo $recipe['description']; ?>
        </p>
        <div class="flex items-center mb-4">
            <span class="text-gray-700 mr-2">Par <?php echo $recipe['user_id']; ?></span>
            <span class="text-gray-500"><i class="fas fa-comment mr-1 text-gray-400"></i>
                <?php echo count($comments); ?> <?php echo count($comments) > 1 ? 'commentaires' : 'commentaire'; ?></span>
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
        <h2 class="text-2xl font-bold mb-4">
            Commentaires (<?php echo count($comments); ?>)
        </h2>

        <?php if (empty($comments)): ?>
            <p class="text-gray-500 italic">Aucun commentaire pour cette recette. Soyez le premier à donner votre avis !</p>
        <?php else: ?>

            <?php foreach ($comments as $comment): ?>
                <div class="mb-4 border-b border-gray-100 pb-4">
                    <div class="flex items-center mb-2">
                        <img
                            src="pictures/<?php echo $comment['author_picture']; ?>"
                            alt="<?php echo $comment['author_name']; ?>"
                            class="w-10 h-10 rounded-full mr-2" />
                        <div>
                            <span class="font-bold block text-gray-800"><?php echo $comment['author_name']; ?></span>
                            <span class="text-xs text-gray-400"><?php echo date('d/m/Y', strtotime($comment['created_at'])); ?></span>
                        </div>
                    </div>
                    <p class="text-gray-700 pl-12">
                        <?php echo $comment['content']; ?>
                    </p>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>
</section>