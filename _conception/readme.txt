TP Projet Site Web Toy'R'Us

Intégrer exactement comme sur la maquette.

La BDD contient:
- "brands": Marques
- "sales": Ventes par jouet et par date
- "stock": Stock disponible par jouet et par magasin
- "stores": Magasin
- "toys": Jouets (Nom, description, id marque, prix, nom du fichier de l'image)

Le site se compose de 3 pages:
- Accueil: Top 3 des meilleures ventes de l'année en cours.
- Liste: Liste des jouets avec filtre par marque.
- Détail: Détail d'un jouet particulier.

Images des jouets:
A stocker dans un dossier dédié (nom au choix).

Menus:
- "Tous les jouets": Lien vers liste complète.
- "Par marque": Sous-menu construit à partir de la BDD avec liens vers la page de liste préfiltrée sur la marque choisie.

Détail:
- Information basiques du jouet
- Stock total, avec possibilité de choisir un magasin pour affiner ce chiffre.


BONUS (à faire si tout est terminé):
- Responsive pour mobile (à imaginer)
- Dans le sous-menu, afficher le nombre de jouets différents pour chaque marque (ex: "Mattel (6)")
- Dans la liste:
  - Tri par prix croissant/décroissant
  - Pagination (4 jouets par page)
