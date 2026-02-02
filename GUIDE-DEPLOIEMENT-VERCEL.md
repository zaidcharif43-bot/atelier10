# 🚀 DÉPLOYER VOTRE PROJET REACT SUR VERCEL - GUIDE ÉTAPE PAR ÉTAPE

## 🎯 Méthode Recommandée : Vercel CLI (La plus rapide)

### Étape 1 : Installer Vercel CLI

```bash
npm install -g vercel
```

### Étape 2 : Se connecter à Vercel

```bash
vercel login
```

Une page s'ouvrira dans votre navigateur. Connectez-vous avec :
- GitHub
- GitLab
- Ou Email

### Étape 3 : Naviguer vers votre projet

```bash
cd c:\Users\dell\OneDrive\Desktop\atelier10-lv\at10
```

### Étape 4 : Déployer !

```bash
vercel
```

**Répondez aux questions** :
- `? Set up and deploy "~\at10"?` → **Y** (Yes)
- `? Which scope do you want to deploy to?` → Choisissez votre compte
- `? Link to existing project?` → **N** (No)
- `? What's your project's name?` → **laravel-react-produits** (ou autre nom)
- `? In which directory is your code located?` → **./** (appuyez sur Entrée)
- `? Want to override the settings?` → **N** (No)

✅ **C'est déployé !** Vercel vous donnera une URL comme : `https://laravel-react-produits-xxx.vercel.app`

### Étape 5 : Déployer en Production

```bash
vercel --prod
```

---

## ⚙️ Configuration Post-Déploiement

### 1. Configurer les Variables d'Environnement

Sur Vercel.com :
1. Allez dans votre projet
2. **Settings** → **Environment Variables**
3. Ajoutez :

```
APP_KEY=base64:VOTRE_CLE_LARAVEL
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-app.vercel.app
```

Pour obtenir APP_KEY :
```bash
php artisan key:generate --show
```

### 2. Configurer la Base de Données

⚠️ **Important** : Vercel ne fournit pas de base de données MySQL.

**Option A : Utiliser AlwaysData (Déjà configuré)**
```
DB_CONNECTION=mysql
DB_HOST=mysql-test-app.alwaysdata.net
DB_PORT=3306
DB_DATABASE=test-app_atelier5
DB_USERNAME=test-app
DB_PASSWORD=votre_password
```

**Option B : PlanetScale (Recommandé pour production)**
1. Allez sur https://planetscale.com
2. Créez un compte gratuit
3. Créez une base de données
4. Copiez les credentials dans Vercel

### 3. Pour les Uploads d'Images - Cloudinary

⚠️ Vercel a un système de fichiers **read-only**. Pour les uploads :

**Installer Cloudinary :**
```bash
composer require cloudinary-labs/cloudinary-laravel
```

**Créer un compte** : https://cloudinary.com (Gratuit)

**Ajouter dans Vercel Environment Variables :**
```
CLOUDINARY_URL=cloudinary://API_KEY:API_SECRET@CLOUD_NAME
```

**Modifier ProduitApiController.php :**
```php
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

// Dans la méthode store()
if ($request->hasFile('image')) {
    $uploadedFileUrl = Cloudinary::upload(
        $request->file('image')->getRealPath()
    )->getSecurePath();
    
    $produit->image = $uploadedFileUrl;
}
```

---

## 📱 URLs Après Déploiement

Votre app sera accessible sur :
- **Page React** : `https://votre-app.vercel.app/react-app`
- **API Produits** : `https://votre-app.vercel.app/api/produits`
- **Home Laravel** : `https://votre-app.vercel.app/`

---

## 🔄 Redéployer après modifications

```bash
# À chaque fois que vous modifiez le code
vercel --prod
```

Ou connectez à GitHub pour auto-deploy (voir Option 2 ci-dessous)

---

## 🐙 OPTION 2 : Déploiement via GitHub (Auto-deploy)

### Étape 1 : Initialiser Git

```bash
cd c:\Users\dell\OneDrive\Desktop\atelier10-lv\at10
git init
git add .
git commit -m "Deploy to Vercel"
```

### Étape 2 : Créer un Repo GitHub

1. Allez sur https://github.com/new
2. Nom du repo : **laravel-react-produits**
3. **Ne cochez rien** (pas de README)
4. Cliquez **Create repository**

### Étape 3 : Pousser sur GitHub

Remplacez `VOTRE-USERNAME` par votre nom d'utilisateur GitHub :

```bash
git remote add origin https://github.com/VOTRE-USERNAME/laravel-react-produits.git
git branch -M main
git push -u origin main
```

### Étape 4 : Connecter à Vercel

1. Allez sur https://vercel.com
2. Cliquez **"New Project"**
3. Cliquez **"Import Git Repository"**
4. Sélectionnez votre repo **laravel-react-produits**
5. **Build & Development Settings** :
   - Framework Preset : `Other`
   - Build Command : `npm run build` (ou laissez vide)
   - Output Directory : `public`
6. Cliquez **"Deploy"**

✅ **Automatique** : À chaque `git push`, Vercel redéploie !

---

## 🛠️ Commandes Utiles

```bash
# Voir vos déploiements
vercel ls

# Voir les logs
vercel logs

# Ouvrir le projet dans le navigateur
vercel open

# Annuler un déploiement
vercel rm DEPLOYMENT_URL

# Voir les infos du projet
vercel inspect
```

---

## ✅ Checklist de Déploiement

Avant de déployer, assurez-vous que :

- [ ] Le serveur local fonctionne (`php artisan serve`)
- [ ] L'app React fonctionne (`http://localhost:8000/react-app`)
- [ ] `npm run build` fonctionne sans erreur
- [ ] Les routes API fonctionnent (`/api/produits`)
- [ ] Le `.gitignore` est configuré (déjà fait ✅)
- [ ] `vercel.json` existe (déjà fait ✅)

---

## 🆘 Résolution de Problèmes

### Erreur : "Command failed"
```bash
# Nettoyer et rebuilder
rm -rf node_modules package-lock.json
npm install
npm run build
```

### Erreur : "Database connection failed"
- Vérifiez les variables d'environnement sur Vercel
- Assurez-vous que la BDD externe est accessible depuis internet

### Erreur : "Routes not found"
- Vérifiez que `vercel.json` est correct
- Vérifiez que les routes sont bien dans `routes/api.php` et `routes/web.php`

### L'upload d'images ne marche pas
- Installez Cloudinary (système read-only sur Vercel)
- Configurez `CLOUDINARY_URL` dans les variables d'environnement

---

## 🎉 Résumé des Commandes Rapides

```bash
# Installation et déploiement en 3 commandes
npm install -g vercel
vercel login
vercel --prod
```

**C'est tout !** Votre app est en ligne ! 🚀

---

## 📞 Après Déploiement

1. **Testez votre app** : Allez sur l'URL fournie par Vercel
2. **Testez l'API** : `https://votre-app.vercel.app/api/produits`
3. **Testez React** : `https://votre-app.vercel.app/react-app`
4. **Partagez** : Envoyez l'URL à qui vous voulez !

🎊 **Félicitations, votre app est déployée !**
