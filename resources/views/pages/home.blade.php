@extends('layouts.app')

@section('title', 'ZC 4u Fashion - Boutique Mode & Vêtements Tendance')

@section('content')
<!-- Hero Section Fashion -->
<section class="hero fashion-hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title"><i class="fas fa-tshirt"></i> ZC 4u Fashion</h1>
            <p class="hero-subtitle">Votre Destination Mode & Vêtements</p>
            <p class="hero-description">Découvrez notre collection exclusive de vêtements tendance pour femme, homme et enfant. Style, qualité et élégance à prix accessible.</p>
            <div class="hero-buttons">
                <a href="{{ route('produits.index') }}" class="btn btn-primary"><i class="fas fa-shopping-bag"></i> Découvrir nos Collections</a>
                <a href="{{ route('produits.category', 'femme') }}" class="btn btn-outline"><i class="fas fa-female"></i> Mode Femme</a>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section">
    <div class="container">
        <h2 class="section-title">Nos Collections de Vêtements</h2>
        <p class="section-subtitle">Explorez nos catégories et trouvez votre style</p>
        <div class="categories-grid">
            <a href="{{ route('produits.category', 'femme') }}" class="category-card femme-card">
                <div class="category-icon"><i class="fas fa-female"></i></div>
                <h3>Mode Femme</h3>
                <p>Robes, tops, pantalons & plus</p>
                <span class="category-count">Nouvelle collection</span>
            </a>
            
            <a href="{{ route('produits.category', 'homme') }}" class="category-card homme-card">
                <div class="category-icon"><i class="fas fa-male"></i></div>
                <h3>Mode Homme</h3>
                <p>Chemises, jeans, vestes & plus</p>
                <span class="category-count">Tendances actuelles</span>
            </a>
            
            <a href="{{ route('produits.category', 'enfant') }}" class="category-card enfant-card">
                <div class="category-icon"><i class="fas fa-child"></i></div>
                <h3>Mode Enfant</h3>
                <p>Vêtements confortables & colorés</p>
                <span class="category-count">Collection kids</span>
            </a>
            
            <a href="{{ route('produits.category', 'chaussures') }}" class="category-card chaussures-card">
                <div class="category-icon"><i class="fas fa-shoe-prints"></i></div>
                <h3>Chaussures</h3>
                <p>Sneakers, boots, sandales</p>
                <span class="category-count">Toutes pointures</span>
            </a>
            
            <a href="{{ route('produits.category', 'accessoires') }}" class="category-card accessoires-card">
                <div class="category-icon"><i class="fas fa-gem"></i></div>
                <h3>Accessoires</h3>
                <p>Sacs, bijoux, montres</p>
                <span class="category-count">Compléments mode</span>
            </a>
            
            <a href="{{ route('produits.category', 'sport') }}" class="category-card sport-card">
                <div class="category-icon"><i class="fas fa-running"></i></div>
                <h3>Sportswear</h3>
                <p>Vêtements de sport tendance</p>
                <span class="category-count">Active wear</span>
            </a>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-section">
    <div class="container">
        <h2 class="section-title"><i class="fas fa-star"></i> Nos Coups de Cœur</h2>
        <p class="section-subtitle">Sélection de nos meilleurs vêtements</p>
        <div class="featured-grid">
            <div class="featured-product">
                <div class="product-badge new">Nouveau</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=1200&q=80&fit=crop" alt="Robe d'Été Florale" style="width: 100%; height: 280px; object-fit: cover; border-radius: 15px;">
                </div>
                <h4>Robe d'Été Florale</h4>
                <p class="product-price">
                    <span class="current-price">79,99 €</span>
                </p>
                <a href="{{ route('produits.show', 2) }}" class="btn btn-outline">Voir le produit</a>
            </div>
            
            <div class="featured-product">
                <div class="product-badge sale">-25%</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=1200&q=80&fit=crop" alt="T-Shirt Premium" style="width: 100%; height: 280px; object-fit: cover; border-radius: 15px;">
                </div>
                <h4>T-Shirt Premium Homme</h4>
                <p class="product-price">
                    <span class="current-price">29,99 €</span>
                    <span class="old-price">39,99 €</span>
                </p>
                <a href="{{ route('produits.show', 1) }}" class="btn btn-outline">Voir le produit</a>
            </div>
            
            <div class="featured-product">
                <div class="product-badge sale">Promo</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1200&q=80&fit=crop" alt="Sneakers Urban" style="width: 100%; height: 280px; object-fit: cover; border-radius: 15px;">
                </div>
                <h4>Sneakers Urban Tendance</h4>
                <p class="product-price">
                    <span class="current-price">89,99 €</span>
                    <span class="old-price">109,99 €</span>
                </p>
                <a href="{{ route('produits.show', 6) }}" class="btn btn-outline">Voir le produit</a>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="container">
        <h2 class="section-title">Pourquoi choisir ZC 4u Fashion ?</h2>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-award"></i></div>
                <h4>Qualité Premium</h4>
                <p>Vêtements sélectionnés avec soin pour un confort et une durabilité exceptionnels.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-tags"></i></div>
                <h4>Prix Accessibles</h4>
                <p>Mode tendance à prix justes, sans compromis sur la qualité des tissus.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-truck"></i></div>
                <h4>Livraison Rapide</h4>
                <p>Expédition sous 24h, livraison gratuite dès 75€ d'achat de vêtements.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon"><i class="fas fa-leaf"></i></div>
                <h4>Mode Responsable</h4>
                <p>Démarche éco-responsable avec des tissus durables et éthiques.</p>
            </div>
        </div>
    </div>
</section>

<style>
/* Fashion-specific styles */
.fashion-hero {
    background: var(--fashion-gradient);
    position: relative;
    overflow: hidden;
    padding: 6rem 0;
}

.fashion-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="fashion-pattern" x="0" y="0" width="30" height="30" patternUnits="userSpaceOnUse"><circle cx="15" cy="15" r="1" fill="white" opacity="0.08"/></pattern></defs><rect width="100" height="100" fill="url(%23fashion-pattern)"/></svg>') repeat;
    pointer-events: none;
}

.hero-content {
    position: relative;
    z-index: 1;
}

.hero-title {
    font-family: 'Playfair Display', serif;
    font-size: 3.5rem;
    margin-bottom: 0.5rem;
}

.hero-title i {
    color: var(--secondary-color);
}

.hero-subtitle {
    font-size: 1.5rem;
    font-weight: 300;
    color: var(--secondary-color);
    margin-bottom: 1rem;
}

.hero-description {
    max-width: 600px;
    margin: 0 auto 2rem;
    opacity: 0.9;
}

.hero-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.categories-section {
    padding: 5rem 0;
    background: var(--cream-color);
}

.section-subtitle {
    text-align: center;
    color: var(--text-light);
    margin-top: -1.5rem;
    margin-bottom: 2rem;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.category-card {
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: 15px;
    text-align: center;
    text-decoration: none;
    color: inherit;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    border: 2px solid transparent;
}

.category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.12);
    border-color: var(--secondary-color);
}

.category-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    display: block;
    color: var(--secondary-color);
}

.category-card h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--primary-color);
}

.category-card p {
    color: var(--text-light);
    margin-bottom: 1rem;
    font-size: 0.95rem;
}

.category-count {
    display: inline-block;
    background: var(--primary-color);
    color: var(--white);
    padding: 0.4rem 1rem;
    border-radius: 25px;
    font-size: 0.8rem;
    font-weight: 500;
    letter-spacing: 0.5px;
}

.femme-card:hover .category-icon { color: #e84393; }
.homme-card:hover .category-icon { color: #1a1a1a; }
.enfant-card:hover .category-icon { color: #ff6b6b; }
.chaussures-card:hover .category-icon { color: #8b7355; }
.accessoires-card:hover .category-icon { color: #d4af37; }
.sport-card:hover .category-icon { color: #45b7d1; }

.femme-card .category-count { background: #e84393; }
.homme-card .category-count { background: #1a1a1a; }
.enfant-card .category-count { background: #ff6b6b; }
.chaussures-card .category-count { background: #8b7355; }
.accessoires-card .category-count { background: #d4af37; color: #1a1a1a; }
.sport-card .category-count { background: #45b7d1; }

.featured-section {
    padding: 5rem 0;
    background: var(--white);
}

.featured-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.featured-product {
    background: var(--cream-color);
    border-radius: 20px;
    padding: 1.5rem;
    text-align: center;
    position: relative;
    transition: all 0.4s ease;
    border: 2px solid transparent;
    overflow: hidden;
}

.featured-product:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
    border-color: var(--secondary-color);
}

.product-badge {
    position: absolute;
    top: 1.2rem;
    right: 1.2rem;
    padding: 0.5rem 1.2rem;
    border-radius: 25px;
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--white);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    z-index: 2;
}

.product-badge.new { background: var(--secondary-color); color: var(--primary-color); }
.product-badge.sale { background: #e53935; }

.product-image {
    margin: 1rem 0;
    border-radius: 15px;
    overflow: hidden;
}

.product-image img {
    transition: transform 0.5s ease;
}

.featured-product:hover .product-image img {
    transform: scale(1.08);
}

.featured-product h4 {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    margin-bottom: 0.8rem;
    color: var(--primary-color);
}

.product-price {
    margin-bottom: 1.5rem;
}

.current-price {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--primary-color);
}

.old-price {
    text-decoration: line-through;
    color: var(--text-light);
    margin-left: 0.5rem;
    font-size: 1rem;
}

.values-section {
    padding: 5rem 0;
    background: var(--primary-color);
    color: var(--white);
}

.values-section .section-title {
    color: var(--white);
}

.values-section .section-title::after {
    background: var(--secondary-color);
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.value-card {
    text-align: center;
    padding: 2rem;
    border-radius: 15px;
    background: rgba(255,255,255,0.05);
    transition: all 0.3s ease;
}

.value-card:hover {
    background: rgba(255,255,255,0.1);
    transform: translateY(-5px);
}

.value-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    display: block;
    color: var(--secondary-color);
}

.value-card h4 {
    font-family: 'Playfair Display', serif;
    font-size: 1.2rem;
    margin-bottom: 1rem;
    color: var(--white);
}

.value-card p {
    color: rgba(255,255,255,0.8);
    line-height: 1.7;
    font-size: 0.95rem;
}

.btn-outline {
    background: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
}

.btn-outline:hover {
    background: var(--primary-color);
    color: var(--white);
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .categories-grid,
    .featured-grid,
    .values-grid {
        grid-template-columns: 1fr;
    }
    
    .hero-buttons {
        flex-direction: column;
        gap: 1rem;
    }
    
    .hero-buttons .btn {
        width: 100%;
        text-align: center;
    }
}
</style>
@endsection