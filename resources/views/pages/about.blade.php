@extends('layouts.app')

@section('title', 'À propos - ZC 4u')

@section('content')
    <!-- Hero About -->
    <section class="hero" style="padding: 3rem 0;">
        <div class="container">
            <h1>À Propos de ZC 4u</h1>
            <p>Votre boutique en ligne de confiance, au service de vos besoins depuis 2020.</p>
        </div>
    </section>

    <!-- Notre Histoire -->
    <section class="section">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center; margin-bottom: 3rem;">
                <div>
                    <h2 style="color: var(--primary-color); font-size: 2.5rem; margin-bottom: 1.5rem;">Notre Histoire</h2>
                    <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 1.5rem;">
                        <strong>ZC 4u</strong> a été fondée en 2020 avec une vision simple : rendre le shopping en ligne 
                        accessible, fiable et agréable pour tous. Née de l'expérience de professionnels du commerce électronique, 
                        notre boutique s'est rapidement imposée comme une référence.
                    </p>
                    <p style="font-size: 1.1rem; line-height: 1.8;">
                        Aujourd'hui, nous proposons une large gamme de produits soigneusement sélectionnés, 
                        des prix compétitifs et un service client exceptionnel. Notre objectif est de vous offrir 
                        une expérience d'achat en ligne simple, sécurisée et satisfaisante.
                    </p>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 8rem; color: var(--primary-color); margin-bottom: 1rem;">🛍️</div>
                    <div style="color: var(--text-light); font-style: italic;">
                        "Plus de 50 000 commandes livrées avec succès"
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notre Mission -->
    <section class="section" style="background: var(--light-color);">
        <div class="container">
            <h2 class="section-title">Notre Mission</h2>
            <div style="text-align: center; max-width: 800px; margin: 0 auto;">
                <p style="font-size: 1.3rem; line-height: 1.8; color: var(--neutral-color); margin-bottom: 2rem;">
                    <em>"Offrir à nos clients une expérience d'achat en ligne exceptionnelle, 
                    avec des produits de qualité, des prix justes et un service client personnalisé, 
                    accessible à tous et disponible 24h/24."</em>
                </p>
                <div style="width: 100px; height: 3px; background: var(--secondary-color); margin: 0 auto;"></div>
            </div>
        </div>
    </section>

    <!-- Nos Valeurs -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Nos Valeurs</h2>
            <div class="card-grid">
                <div class="card">
                    <div class="card-icon" style="color: var(--accent-color);">💯</div>
                    <h3>Qualité</h3>
                    <p>Nous sélectionnons rigoureusement nos produits et partenaires pour vous garantir la meilleure qualité au meilleur prix.</p>
                </div>
                <div class="card">
                    <div class="card-icon" style="color: var(--secondary-color);">🎯</div>
                    <h3>Service Client</h3>
                    <p>Notre équipe dédiée est à votre écoute 7j/7 pour vous accompagner et répondre à toutes vos questions.</p>
                </div>
                <div class="card">
                    <div class="card-icon" style="color: var(--primary-color);">🔒</div>
                    <h3>Sécurité</h3>
                    <p>Paiements sécurisés, protection des données personnelles et transactions cryptées pour votre tranquillité.</p>
                </div>
                <div class="card">
                    <div class="card-icon" style="color: var(--secondary-color);">🚀</div>
                    <h3>Innovation</h3>
                    <p>Nous améliorons constamment notre plateforme et nos services pour vous offrir la meilleure expérience possible.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Notre Équipe -->
    <section class="section" style="background: var(--light-color);">
        <div class="container">
            <h2 class="section-title">L'Équipe ZC 4u</h2>
            <div class="card-grid" style="max-width: 900px; margin: 0 auto;">
                <div class="card">
                    <div style="width: 100px; height: 100px; background: var(--primary-color); border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">👨‍💼</div>
                    <h3>Zaid Chaibi</h3>
                    <p style="color: var(--secondary-color); font-weight: 600; margin-bottom: 0.5rem;">Fondateur & CEO</p>
                    <p>Entrepreneur passionné par l'e-commerce et l'innovation digitale, expert en expérience client.</p>
                </div>
                <div class="card">
                    <div style="width: 100px; height: 100px; background: var(--accent-color); border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">👩‍💼</div>
                    <h3>Sarah Martin</h3>
                    <p style="color: var(--secondary-color); font-weight: 600; margin-bottom: 0.5rem;">Directrice Opérationnelle</p>
                    <p>Spécialiste en logistique et gestion de stock, garantit la qualité de nos services.</p>
                </div>
                <div class="card">
                    <div style="width: 100px; height: 100px; background: var(--secondary-color); border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">👨‍💻</div>
                    <h3>Alex Dubois</h3>
                    <p style="color: var(--secondary-color); font-weight: 600; margin-bottom: 0.5rem;">Responsable Technique</p>
                    <p>Développeur full-stack, assure la sécurité et les performances de notre plateforme.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Nos Engagements -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Nos Engagements</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                <div style="text-align: center; padding: 1.5rem;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🛡️</div>
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Sécurité des Paiements</h3>
                    <p>Transactions 100% sécurisées avec cryptage SSL et protection anti-fraude avancée.</p>
                </div>
                <div style="text-align: center; padding: 1.5rem;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🔄</div>
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Retours Gratuits</h3>
                    <p>30 jours pour changer d'avis avec retours gratuits et remboursement intégral garanti.</p>
                </div>
                <div style="text-align: center; padding: 1.5rem;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🎆</div>
                    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Promotions Exclusives</h3>
                    <p>Offres spéciales régulières, codes promo et programme de fidélité pour nos meilleurs clients.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="section" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%); color: white;">
        <div class="container" style="text-align: center;">
            <h2 style="color: white; margin-bottom: 1rem;">Rejoignez la Communauté ZC 4u</h2>
            <p style="font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9;">
                Plus de 25 000 clients satisfaits nous font déjà confiance. Et vous ?
            </p>
            <a href="{{ route('contact') }}" class="btn" style="background: var(--secondary-color);">
                Contactez-nous
            </a>
        </div>
    </section>
@endsection

@section('styles')
<style>
    @media (max-width: 768px) {
        .container > div[style*="grid-template-columns: 1fr 1fr"] {
            grid-template-columns: 1fr !important;
            gap: 2rem !important;
        }
        
        .hero h1 {
            font-size: 2rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
    }
</style>
@endsection