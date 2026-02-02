# Atelier 10 - Application Laravel + React

## 📋 Description
Application de gestion de produits avec :
- **Backend Laravel** : 2 APIs (filtrer et ajouter produits)
- **Frontend React** : 2 composants (AddComp et FilComp)

## 🚀 APIs Laravel Créées

### 1. API Filtrer les produits
- **Endpoint** : `GET /api/produits/filter/{categorie}`
- **Exemple** : `http://localhost:8000/api/produits/filter/homme`
- **Catégories disponibles** : `tous`, `homme`, `femme`, `accessoires`

### 2. API Ajouter un produit
- **Endpoint** : `POST /api/produits`
- **Format** : `multipart/form-data` (pour l'upload d'image)
- **Champs requis** :
  - `name` : Nom du produit
  - `categorie` : homme, femme ou accessoires
  - `price` : Prix du produit

### 3. API Liste tous les produits
- **Endpoint** : `GET /api/produits`
- **Retourne** : Tous les produits

## ⚛️ Composants React

### 1. AddComp.jsx
Composant pour ajouter un nouveau produit :
- Formulaire complet avec validation
- Upload d'image
- Gestion des erreurs
- Messages de succès/erreur

### 2. FilComp.jsx
Composant pour filtrer et afficher les produits :
- Filtrage par catégorie (Tous, Homme, Femme, Accessoires)
- Affichage en grille responsive
- Badges NEW et PROMO
- Design moderne avec effets hover

## 🛠️ Installation et Utilisation

### 1. Démarrer le serveur Laravel
```bash
cd c:\Users\dell\OneDrive\Desktop\atelier10-lv\at10
php artisan serve
```

### 2. Accéder à l'application React
Ouvrez votre navigateur : `http://localhost:8000/react-app`

## 📁 Structure des fichiers

```
at10/
├── app/
│   └── Http/
│       └── Controllers/
│           └── Api/
│               └── ProduitApiController.php  # Contrôleur API
├── routes/
│   ├── api.php                               # Routes API
│   └── web.php                               # Routes web
├── resources/
│   ├── js/
│   │   ├── app-react.jsx                     # Point d'entrée React
│   │   └── components/
│   │       ├── AddComp.jsx                   # Composant ajout
│   │       └── FilComp.jsx                   # Composant filtrage
│   └── views/
│       └── react-app.blade.php               # Vue Blade pour React
├── config/
│   └── cors.php                              # Configuration CORS
└── vite.config.js                            # Configuration Vite + React
```

## 🎨 Fonctionnalités

### AddComp (Ajouter un produit)
- ✅ Formulaire avec tous les champs nécessaires
- ✅ Upload d'image
- ✅ Validation côté client
- ✅ Messages de succès/erreur
- ✅ Réinitialisation automatique après ajout
- ✅ Design moderne avec dégradés

### FilComp (Filtrer les produits)
- ✅ Boutons de filtrage par catégorie
- ✅ Affichage en grille responsive
- ✅ Compteur de produits
- ✅ Badges NEW et PROMO
- ✅ Affichage des prix avec ancien prix barré
- ✅ Indicateur de stock
- ✅ Effets hover sur les cartes

## 🔧 Configuration CORS

Le CORS est configuré pour permettre toutes les origines pendant le développement.
Fichier : `config/cors.php`

## 📝 Test des APIs avec curl ou Postman

### Tester l'API de filtrage
```bash
curl http://localhost:8000/api/produits/filter/homme
```

### Tester l'API d'ajout (avec Postman)
- Méthode : POST
- URL : `http://localhost:8000/api/produits`
- Body : form-data
  - name: "Nouveau produit"
  - categorie: "homme"
  - price: 99.99
  - image: [fichier image]

## 🎯 Points clés de l'implémentation

1. **APIs RESTful** avec validation des données
2. **Composants React** fonctionnels avec hooks (useState, useEffect)
3. **CORS configuré** pour permettre les requêtes cross-origin
4. **Upload d'images** avec stockage local Laravel
5. **Design responsive** avec CSS inline
6. **Gestion d'état** React pour rafraîchir la liste après ajout

## 📸 Routes disponibles

- Page d'accueil Laravel : `http://localhost:8000/`
- Application React : `http://localhost:8000/react-app`
- API Produits : `http://localhost:8000/api/produits`
- API Filtrer : `http://localhost:8000/api/produits/filter/{categorie}`

## ✨ Technologies utilisées

- **Backend** : Laravel 12
- **Frontend** : React 18
- **Build** : Vite
- **Styling** : CSS inline avec dégradés modernes
- **API** : RESTful JSON
