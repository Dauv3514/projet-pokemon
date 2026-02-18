# Objectifs

Implémentez une application permettant de lister des pokemons, et de les ajouter au sein d'un deck (avec un nombre d'exemplaires).  

## Fonctionnalités attendues

- Lister des pokemons
- Gérer des decks de pokemons
- Filtrer les pokemons par catégorie
- Ajouter, modifier, supprimer des pokemons au sein d'un deck
- Spécifier le nombre d'exemplaires d'un pokemon dans un deck
- Gérer plusieurs decks

# Base de départ

Vous disposez de :

- `data/` : un dossier contenant des fichiers CSV alimentant une base de données de départ (Source: Kaggle)

# Consignes / Livraison

## Cas d'utilisation attendus

### 1. Deux types d'utilisateurs

- Il existe un formulaire permettant de créer un compte utilisateur.  
- Un utilisateur doit pouvoir se connecter et se déconnecter.

### 2. Gestion des pokemons

- Une liste de pokemons doit être fournie par les seeders de l'application.  
- Tout utilisateur, connecté ou non, doit pouvoir :
  - Lister tous les pokemons
  - Filtrer les pokemons sur plusieurs critères, au moins par type  
- En visualisant un pokemon, il doit être possible de le rajouter à un deck existant

### 3. Administration des pokemons

- Un utilisateur connecté peut administrer les pokemons (CRUD)  
- Un utilisateur connecté peut administrer les types de pokemons

### 4. Gestion des decks

- Seuls les utilisateurs connectés peuvent administrer des decks  
- Les decks sont propres à chaque compte utilisateur (un deck ne peut être vu que par son propriétaire)  
- En visualisant son deck, un utilisateur peut :
  - Ajouter des pokemons
  - Modifier des pokemons
  - Supprimer des pokemons

# Contraintes

- Projet à réaliser seul
- Projet à réaliser en utilisant le framework Laravel
- Livraison via un dépôt Git
- Site responsive
- Attention aux nommages de variables et méthodes
- Attention aux nommages des routes (cohérence obligatoire)
- Décomposition des composants cohérente

# Adaptation du sujet pour les B3 2025-2026

Certains peuvent utiliser un autre dataset. Dans tous les cas, vous aurez un modèle principal (ici, un pokemon). Les fonctionnalités attendues :

- Pouvoir lister tous les modèles (ex: le pokedex)
- Filtrer les modèles (ex: pokemon de type Plante)
- Voir un modèle en détail (ex: fiche d'un pokemon)
- Créer un groupe de modèles (ex: faire un deck de pokemons)
- Ajouter un modèle dans le groupe (avec données liées à l'association, ex: 3 Bulbizarre dans mon deck "BADASS")
- Retirer un modèle du groupe (ex: retirer Dracaufeu du deck)
- Supprimer un groupe (ex: supprimer le deck "BADASS")
- Modifier un groupe (ex: renommer le deck "BADASS" en "OLD")
- Ne pas pouvoir voir les groupes d'un autre utilisateur (ex: Nolan ne peut pas voir le deck "BADASS" d'un autre)

> Une attention particulière est attendue pour le graphisme du site et la mise en valeur des informations.  
> N'hésitez pas à utiliser des assets ou des frameworks CSS tels que **Bootstrap** ou **Tailwind**.