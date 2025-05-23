# 💿 DisqueSymfony

Un exercice Symfony réalisé pour apprendre à gérer une API autour d’une base de données de disques, avec Twig pour l’affichage.

## 🎯 Objectif

Ce projet permet de se familiariser avec Symfony, la création et gestion d’API, la manipulation des entités liées aux disques, et le rendu avec Twig.

## 🚀 Technologies utilisées

- **Symfony**
- **PHP**
- **Twig**
- **Doctrine ORM**
- **API Platform / ou API custom**
- **Base de données (MySQL, SQLite, etc.)**

## 🖥️ Fonctionnalités

- Gestion CRUD des disques (Create, Read, Update, Delete)
- Exposition d’une API pour manipuler les données des disques
- Rendu des pages avec Twig pour consultation des disques
- Utilisation de Doctrine pour la gestion des entités

## 🛠️ Installation

1. Clone ce dépôt :
   ```bash
   git clone https://github.com/SirAdaz/DisqueSymfony.git
   ```
2. Installe les dépendances avec Composer :
   ```bash
   composer install
   ```
3. Configure ta base de données dans le fichier `.env`
4. Lance les migrations :
   ```bash
   php bin/console doctrine:migrations:migrate
   ```
5. Lance le serveur local :
   ```bash
   symfony serve
   ```
6. Ouvre `http://localhost:8000` dans ton navigateur.

## Auteur

- **SirAdaz** – [GitHub](https://github.com/SirAdaz)
