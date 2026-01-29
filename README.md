## Objectifs

Implémenter une application permettant de lister des Pokémon et de les ajouter au sein d’un deck (avec un nombre d’exemplaires).

### Fonctionnalités attendues

- Lister des Pokémon
- Ajouter, modifier et supprimer des Pokémon au sein d’un deck
- Spécifier le nombre d’exemplaires d’un Pokémon dans un deck
- Gérer plusieurs decks

---

## Base de départ

Vous disposez de :

- `data/` : un dossier contenant des fichiers **CSV** alimentant une base de données de départ  
  *(Source : Kaggle)*

---

## Consignes / Livraison

Réaliser les pages suivantes :

```mermaid
flowchart TD
    A[HomePage]
    A <--> B[Login]
    A <-->|Add/Remove to deck| A
    A <--> F[Add deck]
    A <--> C[View decks]
    C <--> D[Edit deck]
    C <--> H[Remove deck]
    A <--> G[View pokemon]
    G <--> E[Edit pokemon]
    G <--> J[Add to deck]
    G --> I[Delete pokemon]
    I --> A