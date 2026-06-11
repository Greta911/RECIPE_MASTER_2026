<aside class="w-full md:w-1/4 p-3">
    <div class="bg-yellow-500 text-white rounded-lg shadow-md p-4 mb-4">
        <h2 class="font-bold text-lg mb-4">Catégories</h2>
        <?php
        include_once '../app/models/categoriesModel.php';
        $types = Models\CategoriesModel\findAll($conn);
        ?>
        <ul class="list-reset text-gray-100">
            <?php foreach ($types as $type) : ?>
                <li>
                    <a href="?typeID=<?php echo $type['id']; ?>" class="hover:text-white hover:bg-yellow-600 px-2 block">
                        <?php echo $type['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="bg-yellow-600 text-white rounded-lg shadow-md p-4">
        <h2 class="font-bold text-lg mb-4">Ingrédients</h2>
        <ul class="list-reset text-gray-200">
            <li>
                <a
                    class="hover:text-white hover:bg-yellow-700 px-2 block"
                    href="#">Poulet</a>
            </li>
            <li>
                <a
                    class="hover:text-white hover:bg-yellow-700 px-2 block"
                    href="#">Boeuf</a>
            </li>
            <li>
                <a
                    class="hover:text-white hover:bg-yellow-700 px-2 block"
                    href="#">Poisson</a>
            </li>
            <li>
                <a
                    class="hover:text-white hover:bg-yellow-700 px-2 block"
                    href="#">Légumes</a>
            </li>
            <li>
                <a
                    class="hover:text-white hover:bg-yellow-700 px-2 block"
                    href="#">Fromage</a>
            </li>
        </ul>
    </div>
</aside>