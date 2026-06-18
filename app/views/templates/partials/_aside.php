<aside class="w-full md:w-1/4 p-3">
    <div class="bg-yellow-500 text-white rounded-lg shadow-md p-4 mb-4">
        <h2 class="font-bold text-lg mb-4">Catégories</h2>
        <?php
        include_once '../app/models/categoriesModel.php';
        $types = Models\CategoriesModel\findAllWithRecipesCount($conn);
        ?>
        <ul class="list-reset text-gray-100">
            <?php foreach ($types as $type) : ?>
                <li class="flex justify-between items-center">
                    <a href="?typeID=<?php echo $type['id']; ?>" class="hover:text-white hover:bg-yellow-600 px-2 block">
                        <?php echo $type['name']; ?>
                    </a>
                    <span class="bg-gray-100 text-gray-600 text-xs font-semibold px-2 py-1 rounded-full mb-2">
                        <?php echo $type['nb_recipes']; ?>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="bg-yellow-600 text-white rounded-lg shadow-md p-4">
        <h2 class="font-bold text-lg mb-4">Ingrédients</h2>
        <?php
        include_once '../app/models/ingredientsModel.php';
        $ingredients = Models\IngredientsModel\findAllWithRecipesCount($conn);
        ?>
        <ul class="list-reset text-gray-200">
            <?php foreach ($ingredients as $ingredient) : ?>
                <li class="flex justify-between items-center">
                    <a href="?ingredientID=<?php echo $ingredient['id']; ?>" class="hover:text-white hover:bg-yellow-700 px-2 block">
                        <?php echo $ingredient['name']; ?>
                    </a>
                    <span class="bg-gray-100 text-gray-600 text-xs font-semibold px-2 py-1 rounded-full mb-2">
                        <?php echo $ingredient['nb_recipes']; ?>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>