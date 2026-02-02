# 🚀 Déployer l'Application React sur Vercel

## 📋 Vue d'ensemble

Vous avez **2 options** pour déployer sur Vercel :

### Option 1 : Déployer React + Laravel ensemble (Recommandé) ✅
### Option 2 : Déployer React séparément (API Laravel ailleurs)

---

## 🎯 OPTION 1 : React + Laravel sur Vercel (Recommandé)

### Étape 1 : Initialiser Git

```bash
cd c:\Users\dell\OneDrive\Desktop\atelier10-lv\at10
git init
git add .
git commit -m "Initial commit - Laravel + React App"
```

### Étape 2 : Créer un repo sur GitHub

1. Allez sur https://github.com/new
2. Créez un nouveau repository (ex: `laravel-react-produits`)
3. Ne cochez RIEN (pas de README, pas de .gitignore)
4. Copiez l'URL du repo

### Étape 3 : Pousser sur GitHub

```bash
git remote add origin https://github.com/VOTRE-USERNAME/laravel-react-produits.git
git branch -M main
git push -u origin main
```

### Étape 4 : Mettre à jour vercel.json

Le fichier `vercel.json` doit être configuré correctement (déjà fait ✅)

### Étape 5 : Configurer les variables d'environnement

Créez un fichier `.env.production` :

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-app.vercel.app

DB_CONNECTION=mysql
DB_HOST=votre-host-db
DB_PORT=3306
DB_DATABASE=votre-db
DB_USERNAME=votre-user
DB_PASSWORD=votre-password
```

### Étape 6 : Déployer sur Vercel

1. Allez sur https://vercel.com
2. Connectez-vous avec votre compte GitHub
3. Cliquez sur "New Project"
4. Sélectionnez votre repo `laravel-react-produits`
5. **Framework Preset** : Sélectionnez "Other"
6. **Build Command** : Laissez vide ou `npm run build`
7. **Output Directory** : `public`
8. Cliquez sur "Deploy"

### Étape 7 : Configurer les Variables d'environnement sur Vercel

1. Dans votre projet Vercel, allez dans **Settings** → **Environment Variables**
2. Ajoutez toutes vos variables d'environnement :
   - `APP_ENV` = `production`
   - `APP_DEBUG` = `false`
   - `APP_KEY` = Votre clé Laravel (générez avec `php artisan key:generate --show`)
   - `DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, etc.

---

## 🎯 OPTION 2 : React Standalone sur Vercel (API séparée)

Si vous voulez déployer SEULEMENT React sur Vercel et avoir l'API Laravel ailleurs.

### Étape 1 : Créer un projet React standalone

```bash
cd c:\Users\dell\OneDrive\Desktop\atelier10-lv
npm create vite@latest react-produits-vercel -- --template react
cd react-produits-vercel
npm install
```

### Étape 2 : Copier les composants

Copiez ces fichiers dans le nouveau projet :
- `at10/resources/js/components/AddComp.jsx` → `src/components/AddComp.jsx`
- `at10/resources/js/components/FilComp.jsx` → `src/components/FilComp.jsx`

### Étape 3 : Créer App.jsx

Fichier `src/App.jsx` :

```jsx
import React, { useState } from 'react';
import AddComp from './components/AddComp';
import FilComp from './components/FilComp';

const App = () => {
    const [refreshKey, setRefreshKey] = useState(0);

    const handleProductAdded = () => {
        setRefreshKey(prevKey => prevKey + 1);
    };

    return (
        <div style={{
            minHeight: '100vh',
            background: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
            padding: '40px 20px'
        }}>
            <div style={{ maxWidth: '1200px', margin: '0 auto' }}>
                <div style={{
                    textAlign: 'center',
                    marginBottom: '40px',
                    color: 'white'
                }}>
                    <h1 style={{
                        fontSize: '48px',
                        fontFamily: 'Playfair Display, serif',
                        marginBottom: '10px'
                    }}>
                        🛍️ Gestion des Produits
                    </h1>
                </div>
                <AddComp onProductAdded={handleProductAdded} />
                <div key={refreshKey}>
                    <FilComp />
                </div>
            </div>
        </div>
    );
};

export default App;
```

### Étape 4 : Modifier l'URL de l'API

Dans les composants, changez :
```javascript
// Avant
fetch('http://localhost:8000/api/produits')

// Après
fetch('https://votre-api-laravel.alwaysdata.net/api/produits')
```

### Étape 5 : Créer un fichier de configuration

Créez `.env` à la racine :
```env
VITE_API_URL=https://votre-api-laravel.alwaysdata.net
```

Puis dans les composants :
```javascript
fetch(`${import.meta.env.VITE_API_URL}/api/produits`)
```

### Étape 6 : Initialiser Git et déployer

```bash
git init
git add .
git commit -m "React app for Vercel"
```

Puis suivez les mêmes étapes que l'Option 1 pour GitHub et Vercel.

### Étape 7 : Configuration Vercel pour React

1. **Framework Preset** : Vite
2. **Build Command** : `npm run build`
3. **Output Directory** : `dist`
4. **Install Command** : `npm install`

---

## 📝 Commandes Rapides pour Option 1 (Recommandée)

```bash
# 1. Initialiser Git
cd c:\Users\dell\OneDrive\Desktop\atelier10-lv\at10
git init

# 2. Créer .gitignore
echo "node_modules/" >> .gitignore
echo "vendor/" >> .gitignore
echo ".env" >> .gitignore
echo "storage/*.key" >> .gitignore
echo "public/storage" >> .gitignore
echo "public/hot" >> .gitignore
echo "public/build" >> .gitignore

# 3. Premier commit
git add .
git commit -m "Initial commit - Laravel + React App"

# 4. Créer repo GitHub puis :
git remote add origin https://github.com/VOTRE-USERNAME/laravel-react-produits.git
git branch -M main
git push -u origin main
```

---

## ⚠️ Important pour Vercel

### 1. Base de données
Vercel ne fournit pas de base de données. Utilisez :
- **MySQL** : PlanetScale, Railway, AlwaysData
- **PostgreSQL** : Neon, Supabase
- **MongoDB** : MongoDB Atlas

### 2. Storage (Images)
Vercel a un système de fichiers read-only. Pour les uploads :
- **Cloudinary** (Recommandé)
- **AWS S3**
- **Vercel Blob Storage**

### 3. Modifier le code pour Cloudinary

Installez :
```bash
composer require cloudinary-labs/cloudinary-laravel
```

Dans `.env` :
```env
CLOUDINARY_URL=cloudinary://API_KEY:API_SECRET@CLOUD_NAME
```

Modifiez `ProduitApiController.php` :
```php
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

// Dans store()
if ($request->hasFile('image')) {
    $uploadedFileUrl = Cloudinary::upload(
        $request->file('image')->getRealPath()
    )->getSecurePath();
    $produit->image = $uploadedFileUrl;
}
```

---

## 🎉 Quelle option choisir ?

| Critère | Option 1 | Option 2 |
|---------|----------|----------|
| Simplicité | ⭐⭐⭐ | ⭐⭐ |
| Performance | ⭐⭐ | ⭐⭐⭐ |
| Coût | Gratuit | Gratuit |
| Maintenance | Plus facile | Séparé |

**Recommandation** : **Option 1** si vous débutez, **Option 2** si vous voulez plus de contrôle.

---

## 📞 Prochaines étapes

1. Choisissez votre option (1 ou 2)
2. Suivez le guide étape par étape
3. Si problème, vérifiez les logs sur Vercel

**Besoin d'aide ?** Dites-moi quelle option vous préférez et je vous guide !
