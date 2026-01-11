@extends('layouts.app')

@section('title', 'Collections Vêtements - ZC 4u Fashion')

@section('content')
    <!-- Hero Section -->
    <section class="hero" style="padding: 4rem 0;">
        <div class="container">
            <h1><i class="fas fa-tshirt" style="color: var(--secondary-color);"></i> Nos Collections de Vêtements</h1>
            <p>Découvrez notre sélection de vêtements tendance pour femme, homme et enfant</p>
        </div>
    </section>

    <!-- Filtres et Catégories -->
    <section class="section" style="padding: 2rem 0; background: var(--cream-color);">
        <div class="container">
            <div class="categories-filter" style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; margin-bottom: 2rem;">
                <a href="{{ route('produits.index') }}" class="category-btn active" style="background: var(--primary-color); color: white; padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fas fa-th-large"></i> Toutes les collections
                </a>
                @foreach($categories as $slug => $category)
                    <a href="{{ route('produits.category', $slug) }}" class="category-btn" style="background: var(--white); color: var(--neutral-color); padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 500; transition: all 0.3s ease; border: 2px solid var(--light-color);">
                        {{ $category['icon'] }} {{ $category['name'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Grille de Produits -->
    <section class="section" style="background: var(--cream-color);">
        <div class="container">
            <div class="products-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
                <h2 style="color: var(--primary-color); font-size: 1.8rem; font-family: 'Playfair Display', serif;"><i class="fas fa-shopping-bag" style="color: var(--secondary-color);"></i> {{ count($products) }} Vêtements Disponibles</h2>
                <div class="sort-options">
                    <select style="padding: 0.6rem 1.2rem; border: 2px solid var(--secondary-color); border-radius: 25px; font-size: 0.9rem; background: var(--white); cursor: pointer;">
                        <option>Trier par popularité</option>
                        <option>Prix croissant</option>
                        <option>Prix décroissant</option>
                        <option>Nouveautés</option>
                    </select>
                </div>
            </div>

            <div class="products-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem;">
                @foreach($products as $product)
                    <div class="product-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 8px 30px rgba(0,0,0,0.08); transition: all 0.4s ease; position: relative; border: 1px solid rgba(201, 169, 98, 0.1);">
                        
                        @if($product['new'])
                            <div class="product-badge new" style="position: absolute; top: 15px; left: 15px; background: var(--secondary-color); color: var(--primary-color); padding: 0.5rem 1.2rem; border-radius: 25px; font-size: 0.8rem; font-weight: 600; z-index: 1; text-transform: uppercase; letter-spacing: 0.5px;">
                                Nouveau
                            </div>
                        @endif
                        
                        @if($product['sale'])
                            <div class="product-badge sale" style="position: absolute; top: 15px; right: 15px; background: #e53935; color: white; padding: 0.5rem 1.2rem; border-radius: 25px; font-size: 0.8rem; font-weight: 600; z-index: 1; text-transform: uppercase; letter-spacing: 0.5px;">
                                Promo
                            </div>
                        @endif

                        <div class="product-image" style="height: 300px; overflow: hidden; background: var(--cream-color);">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>

                        <div class="product-info" style="padding: 1.8rem;">
                            <h3 style="color: var(--primary-color); margin-bottom: 0.5rem; font-size: 1.2rem; font-weight: 600; font-family: 'Playfair Display', serif;">
                                <a href="{{ route('produits.show', $product['id']) }}" style="text-decoration: none; color: inherit;">
                                    {{ $product['name'] }}
                                </a>
                            </h3>
                            
                            <div class="rating" style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                                <div class="stars" style="color: var(--secondary-color);">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($product['rating']))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span style="color: var(--text-light); font-size: 0.85rem;">{{ $product['rating'] }} ({{ $product['reviews'] }} avis)</span>
                            </div>

                            <p style="color: var(--text-light); margin-bottom: 1rem; font-size: 0.95rem; line-height: 1.6;">
                                {{ Str::limit($product['description'], 80) }}
                            </p>

                            <div class="product-price" style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem;">
                                <span class="current-price" style="font-size: 1.5rem; font-weight: 700; color: var(--primary-color);">
                                    {{ number_format($product['price'], 2) }}€
                                </span>
                                @if($product['old_price'])
                                    <span class="old-price" style="font-size: 1rem; color: var(--text-light); text-decoration: line-through;">
                                        {{ number_format($product['old_price'], 2) }}€
                                    </span>
                                    <span class="discount" style="background: #e53935; color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 600;">
                                        -{{ round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) }}%
                                    </span>
                                @endif
                            </div>

                            <div class="stock-info" style="margin-bottom: 1.2rem;">
                                @if($product['stock'] <= 5)
                                    <span style="color: #e53935; font-size: 0.85rem; font-weight: 600;">
                                        <i class="fas fa-exclamation-triangle"></i> Plus que {{ $product['stock'] }} en stock !
                                    </span>
                                @else
                                    <span style="color: #43a047; font-size: 0.85rem;">
                                        <i class="fas fa-check-circle"></i> En stock ({{ $product['stock'] }} disponibles)
                                    </span>
                                @endif
                            </div>

                            <div class="product-actions" style="display: flex; gap: 0.8rem;">
                                <button class="btn add-to-cart-btn" data-product-id="{{ $product['id'] }}" style="flex: 1; padding: 0.9rem; font-size: 0.9rem; border-radius: 30px;">
                                    <i class="fas fa-shopping-bag"></i> Ajouter au panier
                                </button>
                                <button class="wishlist-btn" data-product-id="{{ $product['id'] }}" style="background: var(--cream-color); border: 2px solid var(--secondary-color); padding: 0.9rem 1.2rem; border-radius: 30px; color: var(--secondary-color); cursor: pointer; transition: all 0.3s ease;">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if(empty($products))
                <div style="text-align: center; padding: 4rem 0;">
                    <div style="font-size: 4rem; margin-bottom: 1rem; color: var(--secondary-color);"><i class="fas fa-box-open"></i></div>
                    <h3 style="color: var(--neutral-color); margin-bottom: 1rem;">Aucun vêtement trouvé</h3>
                    <p style="color: var(--text-light);">Explorez nos autres collections mode ou parcourez toute notre sélection.</p>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('styles')
<style>
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .category-btn:hover {
        background: var(--primary-color) !important;
        color: white !important;
        border-color: var(--primary-color) !important;
    }

    .category-btn.active {
        background: var(--primary-color) !important;
        color: white !important;
    }

    @media (max-width: 768px) {
        .products-header {
            flex-direction: column;
            gap: 1rem;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        .categories-filter {
            justify-content: flex-start !important;
            overflow-x: auto;
            padding-bottom: 0.5rem;
        }

        .category-btn {
            flex-shrink: 0;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Gestion des boutons ajout au panier
    document.addEventListener('DOMContentLoaded', function() {
        // Boutons ajouter au panier
        const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                addToCart(productId);
            });
        });

        // Boutons wishlist
        const wishlistButtons = document.querySelectorAll('.wishlist-btn');
        wishlistButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                toggleWishlist(productId, this);
            });
        });
    });

    function addToCart(productId) {
        // Simulation d'ajout au panier
        alert('Produit ' + productId + ' ajouté au panier ! 🛒');
        
        // Ici vous ajouteriez la logique d'ajout au panier
        // Par exemple, une requête AJAX vers votre backend
    }

    function toggleWishlist(productId, button) {
        // Simulation de wishlist
        if (button.innerHTML === '❤️') {
            button.innerHTML = '💙';
            button.style.background = 'var(--accent-color)';
            button.style.color = 'white';
        } else {
            button.innerHTML = '❤️';
            button.style.background = 'var(--light-color)';
            button.style.color = 'var(--neutral-color)';
        }
    }

    // Animation des cartes produits
    const cards = document.querySelectorAll('.product-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
</script>
@endsection