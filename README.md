# KLEANKEY 🔑

Application web de gestion pour une conciergerie : biens, services, agents et propriétaires, chacun avec un accès limité à ce qui le concerne.

## 📓 CONTEXTE

Projet final réalisé en individuel pour le titre Développeur Web et Web Mobile (RNCP37674) à SIMPLON.CO, de juin à août 2025.

Le projet a été mené de bout en bout : maquettage, modélisation MERISE (dictionnaire de données, MCD, MLD, MPD), développement back-end et front-end, puis ajustements à partir des retours du client.

## 🎯 FONCTIONNALITÉS

### Espace administrateur
- Connexion dédiée (guard `admin`)
- Gestion des zones, villes, propriétaires, agents, biens et services

### Espace agent
- Liste des biens dont l'agent a la charge et de ses services planifiés
- Accès limité à ses propres biens et services

### Sécurité
- Deux espaces d'authentification séparés (administrateurs et utilisateurs)
- Middlewares de contrôle du rôle et d'accès aux ressources
- Espace propriétaire préparé (contrôleurs et middlewares en place, routes à activer)

## 🛠 TECHNOLOGIES

| Technologie | Usage |
|---|---|
| PHP 8.2 / Laravel 12 | Back-end, routes, contrôleurs, middlewares |
| MySQL | Base de données (13 migrations, seeders de test) |
| Blade | Vues (49 templates) |
| CSS | Mise en forme de l'interface |
| MERISE | Modélisation des données |

## 🚀 INSTALLATION

1. Cloner le projet

   ```bash
   git clone https://github.com/kays-dev/kleankey_app.git
   cd kleankey_app
   ```

2. Installer les dépendances

   ```bash
   composer install
   npm install
   ```

3. Configurer l'environnement
   - Créer un fichier `.env` (à partir du `.env.example` de Laravel) et renseigner l'accès à une base MySQL
   - Générer la clé de l'application : `php artisan key:generate`

4. Créer la base et les données de test

   ```bash
   php artisan migrate --seed
   ```

5. Lancer le projet

   ```bash
   npm run dev
   php artisan serve
   ```

## 👥 AUTEURE

Développé par **Krystal Babel** ([@kays-dev](https://github.com/kays-dev)) dans le cadre de la formation Développeur Web et Web Mobile — SIMPLON.CO, 2025.

## 📜 LICENSE

Ce projet a été développé dans un cadre pédagogique pour mon évaluation finale.