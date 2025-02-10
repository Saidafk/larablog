# Larablog

## Introduction

Ce projet a pour objectif de développer une plateforme de blogging collaborative où les utilisateurs peuvent s'inscrire, se connecter et publier des articles. Chaque utilisateur dispose des droits pour créer, modifier et supprimer ses propres publications. Les articles peuvent être classés par catégories et accompagnés de tags pour en faciliter la recherche. De plus, un système de commentaires permet aux utilisateurs d'interagir et d'échanger autour des publications, favorisant ainsi une véritable communauté d'écriture et de partage.

## Fonctionnalités

Espace utilisateur
- ** [x] Inscription
- ** [x] Connexion
- ** [x] Déconnexion
- ** [x] Réinitialisation de mot de passe
- ** [x] Création d'un article.
- ** [x] Liste des articles de l'utilisateur.
- ** [x] Édition d'un article.
- ** [x] Suppression d'un article.
Partie publique
- ** [x] Liste des articles publiés d'un utilisateur.
- ** [x] Consultation d'un article si publié.
- ** [x] Liste des commentaires d'un article.
- ** [x] Ajout d'un commentaire sur un article.

## Installation

### Prérequis

- PHP >= 8.3
- Composer
- Laravel >= 11.x
- MySQL ou tout système de base de données compatible

### Étapes

1. Cloner le dépôt Git :
2. Installer les dépendances PHP avec Composer : `composer install`
3. Créer un fichier `.env` à partir du modèle `.env.example`.
4. Générer une clé d'application Laravel : `php artisan key:generate`
5. Configurer les informations de base de données dans le fichier `.env` (`DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
6. Lancer le projet avec Laravel : `php artisan serve`
