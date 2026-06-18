<div x-data="{ open: false }" class="bg-gray-800">
    <nav class="shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a
                        class="text-white font-bold text-xl flex items-center"
                        href="?home">
                        <i class="fas fa-utensils text-yellow-500 mr-2"></i> RECIPE
                        MASTER
                    </a>
                </div>
                <div class="flex md:hidden">
                    <button
                        @click="open = !open"
                        type="button"
                        class="text-white hover:text-yellow-500 focus:outline-none focus:text-yellow-500">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                            <path
                                x-show="!open"
                                class="inline-flex"
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M4 6H20V8H4V6ZM4 11H20V13H4V11ZM4 16H20V18H4V16Z" />
                            <path
                                x-show="open"
                                class="inline-flex"
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M4 6H20V8H4V6ZM4 11H20V13H4V11ZM4 16H20V18H4V16ZM6 21H18V19H6V21ZM6 3H18V1H6V3Z" />
                        </svg>
                    </button>
                </div>
                <!--FORMULAIRE POUR LA SEARCHBAR-->
                <div class="hidden md:flex items-center space-x-4">
                    <form action="?recipes=search" method="get" class="flex items-center p-2 rounded-md bg-gray-100 mr-2 w-64">
                        <input type="hidden" name="recipes" value="search" />
                        <input
                            type="text"
                            name="q"
                            placeholder="Rechercher une recette..."
                            value="<?php $_GET['q'] ?? ''; ?>"
                            class="bg-transparent flex-grow focus:outline-none text-gray-700 px-2 text-sm" />
                        <button type="submit" class="text-gray-500 hover:text-gray-800 px-1">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                    <a
                        class="text-white hover:text-yellow-500 px-3 py-2"
                        href="?recipes">Recettes</a>
                    <a
                        class="text-white hover:text-yellow-500 px-3 py-2"
                        href="?users">Chefs</a>
                </div>
            </div>
        </div>
        <div x-show="open" class="md:hidden bg-gray-700">
            <input
                type="text"
                placeholder="Rechercher une recette..."
                class="p-2 w-full" />
            <a class="block text-white hover:text-yellow-500 px-3 py-2" href="#">Recettes</a>
            <a class="block text-white hover:text-yellow-500 px-3 py-2" href="#">Chefs</a>
        </div>
    </nav>
</div>