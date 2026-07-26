# NovaStyle — E-commerce Streetwear

Application web e-commerce complète développée avec Laravel 12, spécialisée dans la mode urbaine et streetwear.

## 🚀 Fonctionnalités

- **Catalogue produits** avec recherche, filtres par catégorie et pagination
- **Gestion des tailles** (S/M/L/XL/XXL) avec stock indépendant par taille
- **Panier** avec modification des quantités et suppression
- **Tunnel de commande** sécurisé avec adresse de livraison structurée
- **Paiement en ligne** via Stripe (carte bancaire)
- **Notifications email** de confirmation de commande (Gmail SMTP)
- **Espace admin** complet : dashboard, CRUD produits/catégories, gestion commandes
- **Authentification** avec rôles (admin / client) via Laravel Breeze
- **Page contact** avec envoi d'email
- **Pages légales** : CGV, mentions légales, livraison & retours

## 🛠 Stack technique

| Technologie | Usage |
|-------------|-------|
| Laravel 12 | Framework PHP back-end (MVC) |
| MySQL 8 | Base de données relationnelle |
| Eloquent ORM | Gestion des modèles et relations |
| Blade + Tailwind CSS | Templates et design |
| Laravel Breeze | Authentification |
| Stripe | Paiement en ligne |
| Gmail SMTP | Notifications email |
| Git / GitHub | Versioning |

## ⚙️ Installation locale

```bash
git clone https://github.com/si11didiop-rgb/novastyle.git
cd novastyle
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

## 🔑 Comptes de test

| Rôle | Email | Mot de passe |
|------|-------|--------------|
| Admin | admin@novastyle.fr | admin1234 |
| Client | client@novastyle.fr | client1234 |

## 💳 Paiement Stripe (mode test)

Carte de test : `4242 4242 4242 4242` — Date : `12/34` — CVV : `123`

## 📁 Structure du projet