<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Liste tous les produits avec catégories
     */
    public function index()
    {
        $products = $this->getAllProducts();
        $categories = $this->getCategories();
        
        return view('pages.products.index', compact('products', 'categories'));
    }

    /**
     * Affiche les produits d'une catégorie spécifique
     */
    public function category($category)
    {
        $products = $this->getProductsByCategory($category);
        $categories = $this->getCategories();
        $currentCategory = $this->getCategoryName($category);
        
        return view('pages.products.category', compact('products', 'categories', 'currentCategory', 'category'));
    }

    /**
     * Affiche un produit spécifique
     */
    public function show($id)
    {
        $product = $this->getProductById($id);
        $relatedProducts = $this->getRelatedProducts($product['category'], $id);
        
        if (!$product) {
            abort(404);
        }
        
        return view('pages.products.show', compact('product', 'relatedProducts'));
    }

    /**
     * Données statiques des catégories
     */
    private function getCategories()
    {
        return [
            'homme' => [
                'name' => 'Homme',
                'icon' => '👨',
                'description' => 'Mode masculine tendance'
            ],
            'femme' => [
                'name' => 'Femme',
                'icon' => '👩',
                'description' => 'Mode féminine élégante'
            ],
            'enfant' => [
                'name' => 'Enfant',
                'icon' => '👶',
                'description' => 'Mode enfantine confortable'
            ],
            'chaussures' => [
                'name' => 'Chaussures',
                'icon' => '👟',
                'description' => 'Chaussures pour tous'
            ],
            'accessoires' => [
                'name' => 'Accessoires',
                'icon' => '👜',
                'description' => 'Sacs, bijoux, accessoires'
            ],
            'sport' => [
                'name' => 'Sportswear',
                'icon' => '🏃',
                'description' => 'Vêtements de sport techniques'
            ]
        ];
    }

    /**
     * Données statiques des produits
     */
    private function getAllProducts()
    {
        return [
            1 => [
                'id' => 1,
                'name' => 'T-Shirt Premium Coton Homme',
                'category' => 'homme',
                'price' => 29.99,
                'old_price' => 39.99,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=1200&q=80&fit=crop',
                'rating' => 4.6,
                'reviews' => 124,
                'description' => 'T-shirt en coton premium, coupe moderne et confortable pour un style décontracté.',
                'features' => ['Coton bio certifié', 'Coupe ajustée', 'Résistant au lavage', 'Tailles S à XXL'],
                'stock' => 45,
                'new' => true,
                'sale' => true
            ],
            2 => [
                'id' => 2,
                'name' => 'Robe d\'Été Florale',
                'category' => 'femme',
                'price' => 79.99,
                'old_price' => null,
                'image' => 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=1200&q=80&fit=crop',
                'rating' => 4.8,
                'reviews' => 89,
                'description' => 'Robe légère à motifs floraux, parfaite pour les journées ensoleillées. Coupe flatteuse et tissu respirant.',
                'features' => ['Tissu respirant', 'Motifs floraux', 'Coupe évasée', 'Lavable en machine'],
                'stock' => 23,
                'new' => true,
                'sale' => false
            ],
            3 => [
                'id' => 3,
                'name' => 'Jean Slim Stretch Homme',
                'category' => 'homme',
                'price' => 69.99,
                'old_price' => 89.99,
                'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?w=1200&q=80&fit=crop',
                'rating' => 4.5,
                'reviews' => 203,
                'description' => 'Jean slim avec élasthanne pour un confort optimal. Coupe moderne et finition premium.',
                'features' => ['98% coton 2% élasthanne', 'Coupe slim', 'Finition stone wash', 'Tailles 28 à 42'],
                'stock' => 67,
                'new' => false,
                'sale' => true
            ],
            4 => [
                'id' => 4,
                'name' => 'Blazer Femme Élégant',
                'category' => 'femme',
                'price' => 149.99,
                'old_price' => 199.99,
                'image' => 'https://images.unsplash.com/photo-1591369822096-ffd140ec948f?w=1200&q=80&fit=crop',
                'rating' => 4.7,
                'reviews' => 156,
                'description' => 'Blazer chic pour femme, idéal pour le bureau ou les occasions spéciales. Coupe ajustée et tissu de qualité.',
                'features' => ['Tissu premium', 'Doublure satin', 'Coupe cintrée', 'Entretien pressing'],
                'stock' => 18,
                'new' => false,
                'sale' => true
            ],
            5 => [
                'id' => 5,
                'name' => 'Ensemble Enfant Coloré',
                'category' => 'enfant',
                'price' => 34.99,
                'old_price' => null,
                'image' => 'https://images.unsplash.com/photo-1519238263530-99bdd11df2ea?w=1200&q=80&fit=crop',
                'rating' => 4.9,
                'reviews' => 78,
                'description' => 'Ensemble t-shirt + short pour enfant avec motifs amusants. Confort et style pour les petits.',
                'features' => ['Coton doux', 'Motifs colorés', 'Facile à laver', 'Tailles 2 à 12 ans'],
                'stock' => 56,
                'new' => true,
                'sale' => false
            ],
            6 => [
                'id' => 6,
                'name' => 'Sneakers Urban Tendance',
                'category' => 'chaussures',
                'price' => 89.99,
                'old_price' => 109.99,
                'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1200&q=80&fit=crop',
                'rating' => 4.6,
                'reviews' => 234,
                'description' => 'Baskets tendance pour un style urbain moderne. Confort optimal et design contemporain.',
                'features' => ['Semelle amortissante', 'Cuir synthétique', 'Design moderne', 'Pointures 36 à 46'],
                'stock' => 89,
                'new' => false,
                'sale' => true
            ],
            7 => [
                'id' => 7,
                'name' => 'Sac à Main Cuir Noir',
                'category' => 'accessoires',
                'price' => 119.99,
                'old_price' => null,
                'image' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=1200&q=80&fit=crop',
                'rating' => 4.8,
                'reviews' => 167,
                'description' => 'Sac à main en cuir véritable, élégant et pratique avec de multiples compartiments.',
                'features' => ['Cuir véritable', 'Multiples poches', 'Bandoulière ajustable', 'Fermeture sécurisée'],
                'stock' => 34,
                'new' => true,
                'sale' => false
            ],
            8 => [
                'id' => 8,
                'name' => 'Legging Sport Performance',
                'category' => 'sport',
                'price' => 49.99,
                'old_price' => 64.99,
                'image' => 'https://images.unsplash.com/photo-1506629082955-511b1aa562c8?w=1200&q=80&fit=crop',
                'rating' => 4.7,
                'reviews' => 145,
                'description' => 'Legging technique pour le sport avec tissu respirant et coupe ergonomique pour un confort optimal.',
                'features' => ['Tissu technique', 'Évacuation humidité', 'Coupe ergonomique', 'Tailles XS à XL'],
                'stock' => 72,
                'new' => false,
                'sale' => true
            ],
            9 => [
                'id' => 9,
                'name' => 'Chemise Oxford Homme',
                'category' => 'homme',
                'price' => 59.99,
                'old_price' => 75.00,
                'image' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=1200&q=80&fit=crop',
                'rating' => 4.5,
                'reviews' => 98,
                'description' => 'Chemise Oxford classique en coton premium, coupe regular fit pour un look professionnel.',
                'features' => ['100% coton Oxford', 'Col boutonné', 'Coupe regular', 'Tailles S à XXL'],
                'stock' => 35,
                'new' => false,
                'sale' => true
            ],
            10 => [
                'id' => 10,
                'name' => 'Veste en Jean Femme',
                'category' => 'femme',
                'price' => 89.99,
                'old_price' => null,
                'image' => 'https://images.unsplash.com/photo-1551537482-f2075a1d41f2?w=1200&q=80&fit=crop',
                'rating' => 4.6,
                'reviews' => 112,
                'description' => 'Veste en jean intemporelle, coupe ajustée avec des détails vintage pour un style décontracté chic.',
                'features' => ['Denim premium', 'Boutons métalliques', 'Poches avant', 'Tailles XS à XL'],
                'stock' => 28,
                'new' => true,
                'sale' => false
            ],
            11 => [
                'id' => 11,
                'name' => 'Boots Cuir Homme',
                'category' => 'chaussures',
                'price' => 129.99,
                'old_price' => 159.99,
                'image' => 'https://images.unsplash.com/photo-1638247025967-b4e38f787b76?w=1200&q=80&fit=crop',
                'rating' => 4.7,
                'reviews' => 87,
                'description' => 'Boots en cuir véritable avec semelle robuste, parfaites pour un look casual élégant.',
                'features' => ['Cuir véritable', 'Semelle antidérapante', 'Doublure confort', 'Pointures 40 à 46'],
                'stock' => 42,
                'new' => false,
                'sale' => true
            ],
            12 => [
                'id' => 12,
                'name' => 'Pull Over Maille Femme',
                'category' => 'femme',
                'price' => 69.99,
                'old_price' => null,
                'image' => 'https://images.unsplash.com/photo-1576566588028-4147f3842f27?w=1200&q=80&fit=crop',
                'rating' => 4.8,
                'reviews' => 134,
                'description' => 'Pull over en maille douce, coupe oversize tendance pour un confort maximal.',
                'features' => ['Maille douce', 'Coupe oversize', 'Col rond', 'Tailles S à L'],
                'stock' => 51,
                'new' => true,
                'sale' => false
            ],
            13 => [
                'id' => 13,
                'name' => 'Sweat à Capuche Sport',
                'category' => 'sport',
                'price' => 54.99,
                'old_price' => 69.99,
                'image' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=1200&q=80&fit=crop',
                'rating' => 4.5,
                'reviews' => 189,
                'description' => 'Sweat à capuche technique idéal pour le sport ou les loisirs. Tissu respirant et confortable.',
                'features' => ['Tissu technique', 'Capuche ajustable', 'Poches kangourou', 'Tailles S à XXL'],
                'stock' => 63,
                'new' => false,
                'sale' => true
            ],
            14 => [
                'id' => 14,
                'name' => 'Robe Enfant Princesse',
                'category' => 'enfant',
                'price' => 44.99,
                'old_price' => null,
                'image' => 'https://images.unsplash.com/photo-1518831959646-742c3a14ebf7?w=1200&q=80&fit=crop',
                'rating' => 4.9,
                'reviews' => 67,
                'description' => 'Adorable robe pour petite fille avec tulle et détails brillants, parfaite pour les occasions spéciales.',
                'features' => ['Tulle et satin', 'Détails pailletés', 'Doublure coton', 'Tailles 2 à 10 ans'],
                'stock' => 25,
                'new' => true,
                'sale' => false
            ],
            15 => [
                'id' => 15,
                'name' => 'Montre Bracelet Cuir',
                'category' => 'accessoires',
                'price' => 79.99,
                'old_price' => 99.99,
                'image' => 'https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=1200&q=80&fit=crop',
                'rating' => 4.6,
                'reviews' => 156,
                'description' => 'Montre élégante avec bracelet en cuir véritable et cadran minimaliste pour un style raffiné.',
                'features' => ['Bracelet cuir', 'Mouvement quartz', 'Étanche 30m', 'Garantie 2 ans'],
                'stock' => 38,
                'new' => false,
                'sale' => true
            ],
            16 => [
                'id' => 16,
                'name' => 'Short Running Homme',
                'category' => 'sport',
                'price' => 34.99,
                'old_price' => null,
                'image' => 'https://images.unsplash.com/photo-1591195853828-11db59a44f6b?w=1200&q=80&fit=crop',
                'rating' => 4.7,
                'reviews' => 201,
                'description' => 'Short de running léger avec doublure intégrée et poches zippées pour vos entraînements.',
                'features' => ['Tissu ultra-léger', 'Doublure mesh', 'Poches zippées', 'Tailles S à XL'],
                'stock' => 74,
                'new' => true,
                'sale' => false
            ]
        ];
    }

    /**
     * Obtenir les produits par catégorie
     */
    private function getProductsByCategory($category)
    {
        $allProducts = $this->getAllProducts();
        return array_filter($allProducts, function($product) use ($category) {
            return $product['category'] === $category;
        });
    }

    /**
     * Obtenir un produit par ID
     */
    private function getProductById($id)
    {
        $products = $this->getAllProducts();
        return isset($products[$id]) ? $products[$id] : null;
    }

    /**
     * Obtenir des produits similaires
     */
    private function getRelatedProducts($category, $excludeId)
    {
        $products = $this->getProductsByCategory($category);
        unset($products[$excludeId]);
        return array_slice($products, 0, 3, true);
    }

    /**
     * Obtenir le nom de la catégorie
     */
    private function getCategoryName($category)
    {
        $categories = $this->getCategories();
        return isset($categories[$category]) ? $categories[$category]['name'] : 'Catégorie inconnue';
    }
}