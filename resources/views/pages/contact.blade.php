@extends('layouts.app')

@section('title', 'Contact - ZC 4u')

@section('content')
    <!-- Hero Contact -->
    <section class="hero" style="padding: 3rem 0;">
        <div class="container">
            <h1>Contactez-nous</h1>
            <p>Une question sur une commande ? Besoin d'aide pour choisir un produit ? Notre équipe est là pour vous accompagner !</p>
        </div>
    </section>

    <!-- Contact Info & Form -->
    <section class="section">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;">
                
                <!-- Informations de contact -->
                <div>
                    <h2 style="color: var(--primary-color); font-size: 2rem; margin-bottom: 2rem;">Nos Coordonnées</h2>
                    
                    <div class="contact-info">
                        <div class="contact-item" style="display: flex; align-items: center; margin-bottom: 1.5rem;">
                            <div style="width: 50px; height: 50px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem; color: white; font-size: 1.2rem;">
                                📧
                            </div>
                            <div>
                                <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">Email</h4>
                                <p style="color: var(--neutral-color);">contact@zc4u.com</p>
                                <p style="color: var(--text-light); font-size: 0.9rem;">Réponse sous 24h garantie</p>
                            </div>
                        </div>

                        <div class="contact-item" style="display: flex; align-items: center; margin-bottom: 1.5rem;">
                            <div style="width: 50px; height: 50px; background: var(--secondary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem; color: white; font-size: 1.2rem;">
                                📞
                            </div>
                            <div>
                                <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">Téléphone</h4>
                                <p style="color: var(--neutral-color);">+33 1 23 45 67 89</p>
                                <p style="color: var(--text-light); font-size: 0.9rem;">Service client 7j/7 : 8h-20h</p>
                            </div>
                        </div>

                        <div class="contact-item" style="display: flex; align-items: center; margin-bottom: 1.5rem;">
                            <div style="width: 50px; height: 50px; background: var(--accent-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem; color: white; font-size: 1.2rem;">
                                📍
                            </div>
                            <div>
                                <h4 style="color: var(--primary-color); margin-bottom: 0.5rem;">Adresse</h4>
                                <p style="color: var(--neutral-color);">123 Rue du Commerce</p>
                                <p style="color: var(--neutral-color);">75001 Paris, France</p>
                                <p style="color: var(--text-light); font-size: 0.9rem;">Entrepôt et service client</p>
                            </div>
                        </div>
                    </div>

                    <!-- Horaires -->
                    <div class="opening-hours" style="background: var(--light-color); padding: 1.5rem; border-radius: 10px; margin-top: 2rem;">
                        <h4 style="color: var(--primary-color); margin-bottom: 1rem;">Service Client</h4>
                        <div style="display: grid; gap: 0.5rem;">
                            <div style="display: flex; justify-content: space-between;">
                                <span>Lundi - Dimanche</span>
                                <strong style="color: var(--primary-color);">8h00 - 20h00</strong>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span>Chat en ligne</span>
                                <strong style="color: var(--accent-color);">24h/24 - 7j/7</strong>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span>Email</span>
                                <strong style="color: var(--accent-color);">24h/24 - 7j/7</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulaire de contact -->
                <div>
                    <h2 style="color: var(--primary-color); font-size: 2rem; margin-bottom: 2rem;">Envoyez-nous un Message</h2>
                    
                    <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                        @csrf
                        
                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--primary-color);">Nom complet *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                   style="width: 100%; padding: 1rem; border: 2px solid #ddd; border-radius: 8px; font-size: 1rem; transition: border-color 0.3s ease;">
                            @error('name')
                                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.5rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--primary-color);">Email *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                   style="width: 100%; padding: 1rem; border: 2px solid #ddd; border-radius: 8px; font-size: 1rem; transition: border-color 0.3s ease;">
                            @error('email')
                                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.5rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label for="subject" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--primary-color);">Sujet *</label>
                            <select id="subject" name="subject" required
                                    style="width: 100%; padding: 1rem; border: 2px solid #ddd; border-radius: 8px; font-size: 1rem; transition: border-color 0.3s ease;">
                                <option value="">Choisissez un sujet...</option>
                                <option value="Information produit" {{ old('subject') == 'Information produit' ? 'selected' : '' }}>Information produit</option>
                                <option value="Commande et livraison" {{ old('subject') == 'Commande et livraison' ? 'selected' : '' }}>Commande et livraison</option>
                                <option value="Retour et échange" {{ old('subject') == 'Retour et échange' ? 'selected' : '' }}>Retour et échange</option>
                                <option value="Problème technique" {{ old('subject') == 'Problème technique' ? 'selected' : '' }}>Problème technique</option>
                                <option value="Partenariat" {{ old('subject') == 'Partenariat' ? 'selected' : '' }}>Partenariat</option>
                                <option value="Autre" {{ old('subject') == 'Autre' ? 'selected' : '' }}>Autre</option>
                            </select>
                            @error('subject')
                                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.5rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label for="message" style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: var(--primary-color);">Message *</label>
                            <textarea id="message" name="message" rows="5" required placeholder="Posez-nous votre question, décrivez votre problème ou faites-nous part de vos suggestions. Plus vous serez précis, mieux nous pourrons vous aider rapidement !"
                                      style="width: 100%; padding: 1rem; border: 2px solid #ddd; border-radius: 8px; font-size: 1rem; resize: vertical; transition: border-color 0.3s ease;">{{ old('message') }}</textarea>
                            @error('message')
                                <div style="color: #e74c3c; font-size: 0.9rem; margin-top: 0.5rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn" style="width: 100%; margin-top: 1rem;">
                            Envoyer le Message
                        </button>

                        <p style="font-size: 0.9rem; color: var(--text-light); text-align: center; margin-top: 1rem;">
                            * Champs obligatoires<br>
                            Nous nous engageons à vous répondre dans les plus brefs délais.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section" style="background: var(--light-color);">
        <div class="container">
            <h2 class="section-title">Questions Fréquentes</h2>
            <div style="max-width: 800px; margin: 0 auto;">
                <div class="faq-item" style="background: white; padding: 1.5rem; border-radius: 10px; margin-bottom: 1rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">🚚 Quels sont vos délais de livraison ?</h4>
                    <p>Expédition sous 24h (jours ouvrés) et livraison standard 2-3 jours en France. Livraison gratuite dès 50€ d'achat. Express 24h disponible.</p>
                </div>
                
                <div class="faq-item" style="background: white; padding: 1.5rem; border-radius: 10px; margin-bottom: 1rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">🔄 Comment procéder à un retour ?</h4>
                    <p>Retours gratuits sous 30 jours. Connectez-vous à votre compte, sélectionnez "Mes commandes" puis "Retourner cet article". Étiquette prépayée fournie.</p>
                </div>
                
                <div class="faq-item" style="background: white; padding: 1.5rem; border-radius: 10px; margin-bottom: 1rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h4 style="color: var(--primary-color); margin-bottom: 1rem;">💳 Quels moyens de paiement acceptez-vous ?</h4>
                    <p>Carte bancaire, PayPal, Apple Pay, Google Pay, virement et paiement en 3x sans frais dès 100€. Tous les paiements sont sécurisés.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    .contact-form input:focus,
    .contact-form select:focus,
    .contact-form textarea:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 3px rgba(44, 85, 48, 0.1);
    }

    @media (max-width: 768px) {
        .container > div[style*="grid-template-columns: 1fr 1fr"] {
            grid-template-columns: 1fr !important;
            gap: 2rem !important;
        }
        
        .contact-item {
            flex-direction: row !important;
            align-items: flex-start !important;
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