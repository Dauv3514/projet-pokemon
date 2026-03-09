# Projet Pokémon Deck Manager (Laravel)

Application web Laravel permettant de consulter un Pokédex, filtrer les Pokémon par type, et composer des decks personnels avec gestion des quantités.

## Objectif du projet

Ce projet répond au sujet de cours Laravel:

- authentification (inscription / connexion / déconnexion)
- consultation d'un catalogue de Pokémon
- filtrage par type
- gestion de decks privés par utilisateur
- CRUD d'administration (types + pokémons)

## Fonctionnalités implémentées

### Côté utilisateur

- Voir la liste des Pokémon (`/` ou `/home`)
- Filtrer les Pokémon par type
- Voir la fiche détaillée d'un Pokémon
- Créer un deck
- Voir ses decks
- Renommer / supprimer un deck
- Ajouter un Pokémon à un deck avec une quantité
- Modifier la quantité ou retirer un Pokémon d'un deck

### Côté authentification

- Inscription
- Connexion
- Déconnexion
- Routes Laravel UI (`Auth::routes()`)

### Côté administration

Accessible aux utilisateurs connectés via `/admin`:

- CRUD des types
- CRUD des pokémons

## Stack technique

- PHP `^8.2`
- Laravel `^12`
- SQLite (par défaut)
- Blade + Vite
- Node.js / npm
- Bootstrap / Sass / Vue (dépendances front installées)

## Prérequis

- PHP 8.2+
- Composer
- Node.js 18+ et npm
- SQLite 3+

## Installation

Depuis la racine du dépôt:

```bash
cd app-laravel
```

### Option 1: installation rapide (recommandée)

```bash
composer run setup
php artisan db:seed
php artisan db:seed --class=PokemonSeeder
```

### Option 2: installation manuelle

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan db:seed
php artisan db:seed --class=PokemonSeeder
npm install
npm run build
```

## Lancer le projet

### Mode développement complet (recommandé)

```bash
composer run dev
```

Cette commande lance en parallèle:

- serveur Laravel (`php artisan serve`)
- worker queue (`php artisan queue:listen`)
- logs (`php artisan pail`)
- Vite (`npm run dev`)

Application disponible sur:

- `http://127.0.0.1:8000`

### Mode simple (2 terminaux)

Terminal 1:

```bash
php artisan serve
```

Terminal 2:

```bash
npm run dev
```

## Données de test

Le projet contient un dataset Pokémon JSON:

- fichier: `app-laravel/database/seeders/pokemons.json`

Seeder dédié:

```bash
php artisan db:seed --class=PokemonSeeder
```

Le `DatabaseSeeder` crée aussi un utilisateur de test:

- email: `test@example.com`
- mot de passe: `password`

## Commandes utiles

Depuis `app-laravel/`:

```bash
# Migrations
php artisan migrate
php artisan migrate:fresh

# Seeder global + Pokémon
php artisan db:seed
php artisan db:seed --class=PokemonSeeder

# Cache/config
php artisan optimize:clear
php artisan config:clear

# Routes
php artisan route:list

# Tests
php artisan test
composer test

# Build front
npm run dev
npm run build
```

## Structure utile

```text
.
├── README.md
└── app-laravel/
    ├── app/
    │   ├── Http/Controllers/
    │   └── Models/
    ├── database/
    │   ├── migrations/
    │   └── seeders/
    ├── resources/views/
    ├── routes/web.php
    └── public/images/
```

## Règles métier principales

- Un deck appartient à un seul utilisateur (`decks.user_id`)
- Un utilisateur ne peut voir/modifier que ses propres decks
- Relation many-to-many deck/pokémon avec quantité (`deck_has_pokemon.quantity`)
- Limite métier en ajout rapide: maximum **15 Pokémon** par deck

## Routes principales

- `/` ou `/home`: liste + filtre des Pokémon
- `/home/{pokemon}`: détail d'un Pokémon
- `/register`, `/login`, `/logout`: authentification
- `/decks`: gestion des decks (auth requis)
- `/admin`: dashboard administration (auth requis)
- `/admin/pokemons`: CRUD pokémons
- `/admin/types`: CRUD types

