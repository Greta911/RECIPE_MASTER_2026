DÉFI MVC: RECIPE MASTER

MUST
V	1. Route users.index depuis le lien du menu 
V	2. Route users.show depuis les liens vers les users
V	3. Route categories.show quand on clique sur une catégorie
V	4. Route ingredients.show quand on clique sur un ingrédient

SHOULD
V	1. Route recipes.search: recherche full-text sur titre et desc des recipes
V	2. Liste des Commentaires dans la recipes.show
	
COULD
V	1. Nombre de recette par ingredients dans le menu
	   Aubergine (32)
V	2. Nombre de comments à côté du titre dans les listes de recipes
       Instant Pot Chili Mac [💬 3]
V	3. Tri par popularité des recipes de la homepage via une procédure stockée
V	4. La recherche porte sur plusieurs mots
	5. Pagination (afficher 6 recipes à la fois et passer d'une page à l'autre)
	   Prec | 1 | 2 | 3 ... | 9 | Next

	   	SELECT ...
	   	LIMIT 6
	   	OFFSET 12