@extends('layouts.app')

@section('title', $product['name'] . ' - Vêtements ZC 4u Fashion')

@section('content')
    <div style="margin-top: 2rem; background: var(--cream-color); padding-bottom: 3rem;">
        <!-- Breadcrumb -->
        <div class="container">
            <nav style="margin-bottom: 2rem; padding: 1.5rem 0; border-bottom: 2px solid var(--secondary-color);">
                <a href="{{ route('home') }}" style="color: var(--text-light); text-decoration: none;"><i class="fas fa-home"></i> Accueil</a>
                <span style="margin: 0 0.5rem; color: var(--secondary-color);">/</span>
                <a href="{{ route('produits.index') }}" style="color: var(--text-light); text-decoration: none;">Collections</a>
                <span style="margin: 0 0.5rem; color: var(--secondary-color);">/</span>
                <a href="{{ route('produits.category', $product['category']) }}" style="color: var(--text-light); text-decoration: none;">{{ ucfirst($product['category']) }}</a>
                <span style="margin: 0 0.5rem; color: var(--secondary-color);">/</span>
                <span style="color: var(--primary-color); font-weight: 600;">{{ $product['name'] }}</span>
            </nav>
        </div>

        <!-- Détail du produit -->
        <section class="section" style="padding-top: 2rem;">
            <div class="container">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; margin-bottom: 3rem;">
                    
                    <!-- Image du produit -->
                    <div class="product-image-section">
                        <div class="main-image" style="background: var(--white); border-radius: 25px; height: 550px; overflow: hidden; margin-bottom: 1.5rem; position: relative; box-shadow: 0 15px 50px rgba(0,0,0,0.12);">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" style="width: 100%; height: 100%; object-fit: cover;">
                            
                            @if($product['new'])
                                <div class="product-badge new" style="position: absolute; top: 20px; left: 20px; background: var(--secondary-color); color: var(--primary-color); padding: 0.6rem 1.5rem; border-radius: 30px; font-size: 0.9rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                                    Nouveau
                                </div>
                            @endif
                            
                            @if($product['sale'])
                                <div class="product-badge sale" style="position: absolute; top: 20px; right: 20px; background: #e53935; color: white; padding: 0.6rem 1.5rem; border-radius: 30px; font-size: 0.9rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                                    Promo
                                </div>
                            @endif
                        </div>
                        
                        <!-- Miniatures -->
                        <div style="display: flex; gap: 1rem; justify-content: center;">
                            @for($i = 1; $i <= 3; $i++)
                                <div style="width: 100px; height: 100px; background: var(--white); border-radius: 15px; overflow: hidden; cursor: pointer; border: 3px solid {{ $i === 1 ? 'var(--secondary-color)' : 'transparent' }}; box-shadow: 0 5px 20px rgba(0,0,0,0.1); transition: all 0.3s ease;">
                                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Informations du produit -->
                    <div class="product-info-section">
                        <h1 style="color: var(--primary-color); font-size: 2.2rem; margin-bottom: 1rem; line-height: 1.3; font-family: 'Playfair Display', serif;">
                            {{ $product['name'] }}
                        </h1>

                        <!-- Évaluation -->
                        <div class="rating" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                            <div class="stars" style="color: var(--secondary-color); font-size: 1.1rem;">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($product['rating']))
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span style="color: var(--text-light); font-weight: 500;">{{ $product['rating'] }}/5</span>
                            <span style="color: var(--text-light);">({{ $product['reviews'] }} avis clients)</span>
                        </div>

                        <!-- Prix -->
                        <div class="product-price" style="margin-bottom: 2rem; background: var(--white); padding: 1.5rem; border-radius: 15px; border-left: 4px solid var(--secondary-color);">
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.5rem;">
                                <span class="current-price" style="font-size: 2.5rem; font-weight: 700; color: var(--primary-color);">
                                    {{ number_format($product['price'], 2) }}€
                                </span>
                                @if($product['old_price'])
                                    <span class="old-price" style="font-size: 1.5rem; color: var(--text-light); text-decoration: line-through;">
                                        {{ number_format($product['old_price'], 2) }}€
                                    </span>
                                    <span class="discount" style="background: #e53935; color: white; padding: 0.5rem 1rem; border-radius: 20px; font-weight: 600; font-size: 0.9rem;">
                                        Économisez {{ number_format($product['old_price'] - $product['price'], 2) }}€
                                    </span>
                                @endif
                            </div>
                            @if($product['old_price'])
                                <p style="color: var(--text-light); font-size: 0.9rem; margin-top: 0.5rem;">
                                    <i class="fas fa-tag" style="color: #e53935;"></i> Prix de lancement : vous économisez {{ round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) }}% !
                                </p>
                            @endif
                        </div>

                        <!-- Description -->
                        <div style="margin-bottom: 2rem;">
                            <h3 style="color: var(--primary-color); margin-bottom: 1rem; font-family: 'Playfair Display', serif;"><i class="fas fa-info-circle" style="color: var(--secondary-color);"></i> Description</h3>
                            <p style="color: var(--neutral-color); font-size: 1.05rem; line-height: 1.7;">
                                {{ $product['description'] }}
                            </p>
                        </div>

                        <!-- Caractéristiques -->
                        <div style="margin-bottom: 2rem; background: var(--white); padding: 1.5rem; border-radius: 15px;">
                            <h3 style="color: var(--primary-color); margin-bottom: 1rem; font-family: 'Playfair Display', serif;"><i class="fas fa-list-check" style="color: var(--secondary-color);"></i> Caractéristiques</h3>
                            <ul style="list-style: none; padding: 0;">
                                @foreach($product['features'] as $feature)
                                    <li style="display: flex; align-items: center; margin-bottom: 0.7rem; color: var(--neutral-color); font-size: 0.95rem;">
                                        <i class="fas fa-check-circle" style="color: #43a047; margin-right: 0.8rem;"></i>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Stock -->
                        <div class="stock-info" style="margin-bottom: 2rem;">
                            @if($product['stock'] <= 5)
                                <div style="background: #fff5f5; border: 2px solid #e53935; border-radius: 12px; padding: 1.2rem;">
                                    <span style="color: #e53935; font-size: 1.05rem; font-weight: 600;">
                                        <i class="fas fa-exclamation-triangle"></i> Attention : Plus que {{ $product['stock'] }} en stock !
                                    </span>
                                    <p style="color: var(--text-light); margin-top: 0.5rem; font-size: 0.9rem;">Commandez vite pour ne pas manquer cette opportunité.</p>
                                </div>
                            @else
                                <div style="background: #e8f5e9; border: 2px solid #43a047; border-radius: 12px; padding: 1.2rem;">
                                    <span style="color: #43a047; font-size: 1.05rem; font-weight: 600;">
                                        <i class="fas fa-check-circle"></i> En stock ({{ $product['stock'] }} disponibles)
                                    </span>
                                    <p style="color: var(--text-light); margin-top: 0.5rem; font-size: 0.9rem;"><i class="fas fa-truck"></i> Expédition sous 24h ouvrées.</p>
                                </div>
                            @endif
                        </div>

                        <!-- Actions d'achat -->
                        <div class="purchase-actions" style="display: flex; flex-direction: column; gap: 1rem;">
                            <div style="display: flex; gap: 1rem;">
                                <div style="display: flex; align-items: center; border: 2px solid var(--secondary-color); border-radius: 12px; overflow: hidden; background: var(--white);">
                                    <button class="quantity-btn" data-action="decrease" style="background: var(--cream-color); border: none; padding: 1rem 1.2rem; cursor: pointer; font-size: 1.2rem; color: var(--primary-color); font-weight: 600;">-</button>
                                    <input type="number" id="quantity" value="1" min="1" max="{{ $product['stock'] }}" style="border: none; width: 60px; text-align: center; font-size: 1.1rem; font-weight: 600; background: var(--white);">
                                    <button class="quantity-btn" data-action="increase" style="background: var(--cream-color); border: none; padding: 1rem 1.2rem; cursor: pointer; font-size: 1.2rem; color: var(--primary-color); font-weight: 600;">+</button>
                                </div>
                                <button class="btn add-to-cart-btn" data-product-id="{{ $product['id'] }}" style="flex: 1; padding: 1rem 2rem; font-size: 1rem; font-weight: 600;">
                                    <i class="fas fa-shopping-bag"></i> Ajouter au panier
                                </button>
                            </div>
                            
                            <div style="display: flex; gap: 1rem;">
                                <button class="buy-now-btn" style="flex: 1; background: var(--primary-color); color: var(--secondary-color); border: none; padding: 1rem 2rem; border-radius: 50px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease;">
                                    <i class="fas fa-bolt"></i> Acheter maintenant
                                </button>
                                <button class="wishlist-btn" data-product-id="{{ $product['id'] }}" style="background: var(--white); border: 2px solid var(--secondary-color); padding: 1rem 1.5rem; border-radius: 50px; color: var(--secondary-color); cursor: pointer; transition: all 0.3s ease; font-size: 1.1rem;">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Garanties -->
                        <div style="margin-top: 2rem; padding: 1.5rem; background: var(--white); border-radius: 15px; border: 1px solid rgba(201, 169, 98, 0.2);">
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                                <div style="text-align: center;">
                                    <div style="color: var(--secondary-color); font-size: 1.5rem; margin-bottom: 0.5rem;"><i class="fas fa-truck"></i></div>
                                    <div style="font-weight: 600; color: var(--primary-color);">Livraison gratuite</div>
                                    <div style="font-size: 0.85rem; color: var(--text-light);">Dès 50€ d'achat</div>
                                </div>
                                <div style="text-align: center;">
                                    <div style="color: var(--secondary-color); font-size: 1.5rem; margin-bottom: 0.5rem;"><i class="fas fa-undo"></i></div>
                                    <div style="font-weight: 600; color: var(--primary-color);">Retour gratuit</div>
                                    <div style="font-size: 0.85rem; color: var(--text-light);">Sous 30 jours</div>
                                </div>
                                <div style="text-align: center;">
                                    <div style="color: var(--secondary-color); font-size: 1.5rem; margin-bottom: 0.5rem;"><i class="fas fa-shield-alt"></i></div>
                                    <div style="font-weight: 600; color: var(--primary-color);">Paiement sécurisé</div>
                                    <div style="font-size: 0.85rem; color: var(--text-light);">SSL & 3D Secure</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Produits similaires -->
        @if(!empty($relatedProducts))
            <section class="section" style="background: var(--white);">
                <div class="container">
                    <h2 style="color: var(--primary-color); text-align: center; margin-bottom: 1rem; font-size: 2rem; font-family: 'Playfair Display', serif;"><i class="fas fa-tshirt" style="color: var(--secondary-color);"></i> Vêtements similaires</h2>
                    <p style="text-align: center; color: var(--text-light); margin-bottom: 2rem;">Découvrez d'autres articles qui pourraient vous plaire</p>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
                        @foreach($relatedProducts as $related)
                            <div class="product-card" style="background: var(--cream-color); border-radius: 15px; overflow: hidden; box-shadow: 0 5px 25px rgba(0,0,0,0.08); transition: all 0.4s ease; border: 1px solid rgba(201, 169, 98, 0.1);">
                                <div class="product-image" style="height: 180px; overflow: hidden; background: var(--white);">
                                    <img src="{{ $related['image'] }}" alt="{{ $related['name'] }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                                </div>
                                <div style="padding: 1.5rem;">
                                    <h4 style="color: var(--primary-color); margin-bottom: 0.5rem; font-family: 'Playfair Display', serif;">
                                        <a href="{{ route('produits.show', $related['id']) }}" style="text-decoration: none; color: inherit;">
                                            {{ $related['name'] }}
                                        </a>
                                    </h4>
                                    <div style="color: var(--primary-color); font-weight: 700; font-size: 1.2rem;">
                                        {{ number_format($related['price'], 2) }}€
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection

@section('styles')
<style>
    @media (max-width: 768px) {
        .container > div[style*="grid-template-columns: 1fr 1fr"] {
            grid-template-columns: 1fr !important;
            gap: 2rem !important;
        }
        
        .product-info-section h1 {
            font-size: 2rem !important;
        }
        
        .current-price {
            font-size: 2rem !important;
        }
        
        .purchase-actions > div {
            flex-direction: column !important;
        }
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Boutons quantité
        const quantityButtons = document.querySelectorAll('.quantity-btn');
        quantityButtons.forEach(button => {
            button.addEventListener('click', function() {
                const action = this.getAttribute('data-action');
                if (action === 'increase') {
                    increaseQuantity();
                } else if (action === 'decrease') {
                    decreaseQuantity();
                }
            });
        });

        // Bouton ajouter au panier
        const addToCartBtn = document.querySelector('.add-to-cart-btn');
        if (addToCartBtn) {
            addToCartBtn.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                addToCart(productId, this);
            });
        }

        // Bouton wishlist
        const wishlistBtn = document.querySelector('.wishlist-btn');
        if (wishlistBtn) {
            wishlistBtn.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                toggleWishlist(productId, this);
            });
        }

        // Bouton acheter maintenant
        const buyNowBtn = document.querySelector('.buy-now-btn');
        if (buyNowBtn) {
            buyNowBtn.addEventListener('click', function() {
                alert('🚀 Redirection vers le paiement express !');
            });
        }
    });

    function increaseQuantity() {
        const input = document.getElementById('quantity');
        const max = parseInt(input.max);
        const current = parseInt(input.value);
        if (current < max) {
            input.value = current + 1;
        }
    }

    function decreaseQuantity() {
        const input = document.getElementById('quantity');
        const current = parseInt(input.value);
        if (current > 1) {
            input.value = current - 1;
        }
    }

    function addToCart(productId, button) {
        const quantity = document.getElementById('quantity').value;
        
        // Animation du bouton
        const originalText = button.innerHTML;
        button.style.background = 'var(--accent-color)';
        button.innerHTML = '✅ Ajouté au panier !';
        
        setTimeout(() => {
            button.style.background = 'var(--primary-color)';
            button.innerHTML = originalText;
        }, 3000);
    }

    function toggleWishlist(productId, button) {
        if (button.innerHTML.trim() === '❤️') {
            button.innerHTML = '💙';
            button.style.background = 'var(--accent-color)';
            button.style.color = 'white';
            button.style.borderColor = 'var(--accent-color)';
        } else {
            button.innerHTML = '❤️';
            button.style.background = 'var(--light-color)';
            button.style.color = 'var(--neutral-color)';
            button.style.borderColor = 'var(--light-color)';
        }
    }
</script>
@endsection