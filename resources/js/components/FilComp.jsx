import React, { useState, useEffect } from 'react';

const FilComp = () => {
    const [produits, setProduits] = useState([]);
    const [categorieActive, setCategorieActive] = useState('tous');
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState('');

    const categories = [
        { id: 'tous', label: 'Tous', icon: '🛍️' },
        { id: 'homme', label: 'Homme', icon: '👨' },
        { id: 'femme', label: 'Femme', icon: '👩' },
        { id: 'accessoires', label: 'Accessoires', icon: '👜' }
    ];

    const fetchProduits = async (categorie = 'tous') => {
        setLoading(true);
        setError('');
        try {
            const url = categorie === 'tous' 
                ? 'http://localhost:8000/api/produits'
                : `http://localhost:8000/api/produits/filter/${categorie}`;
            
            const response = await fetch(url);
            const data = await response.json();

            if (data.success) {
                setProduits(data.data);
            } else {
                setError('Erreur lors du chargement des produits');
            }
        } catch (err) {
            setError('Erreur de connexion au serveur');
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchProduits(categorieActive);
    }, [categorieActive]);

    const handleCategorieClick = (categorie) => {
        setCategorieActive(categorie);
    };

    return (
        <div style={{
            background: 'white',
            borderRadius: '15px',
            padding: '30px',
            boxShadow: '0 10px 40px rgba(0,0,0,0.1)'
        }}>
            <h2 style={{
                marginBottom: '20px',
                fontFamily: 'Playfair Display, serif',
                color: '#1a1a2e'
            }}>
                🔍 Filtrer les produits
            </h2>

            {/* Boutons de filtrage */}
            <div style={{
                display: 'flex',
                gap: '15px',
                flexWrap: 'wrap',
                justifyContent: 'center',
                marginBottom: '30px'
            }}>
                {categories.map(cat => (
                    <button
                        key={cat.id}
                        onClick={() => handleCategorieClick(cat.id)}
                        style={{
                            padding: '10px 25px',
                            borderRadius: '25px',
                            border: 'none',
                            background: categorieActive === cat.id 
                                ? 'linear-gradient(135deg, #e94560 0%, #f27121 100%)'
                                : '#f8f9fa',
                            color: categorieActive === cat.id ? 'white' : '#333',
                            fontWeight: '600',
                            cursor: 'pointer',
                            transition: 'all 0.3s',
                            fontSize: '14px'
                        }}
                        onMouseOver={(e) => {
                            if (categorieActive !== cat.id) {
                                e.target.style.background = '#e9ecef';
                            }
                        }}
                        onMouseOut={(e) => {
                            if (categorieActive !== cat.id) {
                                e.target.style.background = '#f8f9fa';
                            }
                        }}
                    >
                        {cat.icon} {cat.label}
                    </button>
                ))}
            </div>

            {/* Messages */}
            {error && (
                <div style={{
                    padding: '15px',
                    borderRadius: '8px',
                    marginBottom: '20px',
                    background: '#f8d7da',
                    color: '#721c24',
                    border: '1px solid #f5c6cb'
                }}>
                    {error}
                </div>
            )}

            {loading && (
                <div style={{ textAlign: 'center', padding: '40px', fontSize: '18px', color: '#666' }}>
                    Chargement...
                </div>
            )}

            {/* Liste des produits */}
            {!loading && produits.length > 0 && (
                <>
                    <div style={{
                        marginBottom: '20px',
                        padding: '10px 20px',
                        background: '#f8f9fa',
                        borderRadius: '8px',
                        textAlign: 'center',
                        fontWeight: '600',
                        color: '#e94560'
                    }}>
                        {produits.length} produit(s) trouvé(s)
                    </div>

                    <div style={{
                        display: 'grid',
                        gridTemplateColumns: 'repeat(auto-fill, minmax(250px, 1fr))',
                        gap: '20px'
                    }}>
                        {produits.map(produit => (
                            <div
                                key={produit.id}
                                style={{
                                    border: '1px solid #eee',
                                    borderRadius: '10px',
                                    overflow: 'hidden',
                                    transition: 'transform 0.3s, box-shadow 0.3s',
                                    cursor: 'pointer'
                                }}
                                onMouseOver={(e) => {
                                    e.currentTarget.style.transform = 'translateY(-5px)';
                                    e.currentTarget.style.boxShadow = '0 10px 30px rgba(0,0,0,0.15)';
                                }}
                                onMouseOut={(e) => {
                                    e.currentTarget.style.transform = 'translateY(0)';
                                    e.currentTarget.style.boxShadow = 'none';
                                }}
                            >
                                <div style={{
                                    position: 'relative',
                                    paddingBottom: '100%',
                                    overflow: 'hidden',
                                    background: '#f8f9fa'
                                }}>
                                    {(produit.image_url || produit.image) && (
                                        <img
                                            src={produit.image_url || produit.image}
                                            alt={produit.name}
                                            style={{
                                                position: 'absolute',
                                                top: 0,
                                                left: 0,
                                                width: '100%',
                                                height: '100%',
                                                objectFit: 'cover'
                                            }}
                                        />
                                    )}
                                    {produit.new && (
                                        <span style={{
                                            position: 'absolute',
                                            top: '10px',
                                            left: '10px',
                                            background: '#28a745',
                                            color: 'white',
                                            padding: '5px 10px',
                                            borderRadius: '5px',
                                            fontSize: '12px',
                                            fontWeight: '600'
                                        }}>
                                            NEW
                                        </span>
                                    )}
                                    {produit.sale && (
                                        <span style={{
                                            position: 'absolute',
                                            top: '10px',
                                            right: '10px',
                                            background: '#e94560',
                                            color: 'white',
                                            padding: '5px 10px',
                                            borderRadius: '5px',
                                            fontSize: '12px',
                                            fontWeight: '600'
                                        }}>
                                            PROMO
                                        </span>
                                    )}
                                </div>
                                <div style={{ padding: '15px' }}>
                                    <h3 style={{
                                        fontSize: '16px',
                                        fontWeight: '600',
                                        marginBottom: '8px',
                                        color: '#1a1a2e'
                                    }}>
                                        {produit.name}
                                    </h3>
                                    <div style={{
                                        marginBottom: '8px'
                                    }}>
                                        <span style={{
                                            background: '#e94560',
                                            color: 'white',
                                            padding: '3px 10px',
                                            borderRadius: '15px',
                                            fontSize: '12px',
                                            fontWeight: '600'
                                        }}>
                                            {produit.categorie}
                                        </span>
                                    </div>
                                    <div style={{ marginBottom: '8px' }}>
                                        <span style={{
                                            fontSize: '20px',
                                            fontWeight: '700',
                                            color: '#e94560'
                                        }}>
                                            {parseFloat(produit.price).toFixed(2)}€
                                        </span>
                                        {produit.old_price && (
                                            <span style={{
                                                marginLeft: '8px',
                                                fontSize: '14px',
                                                textDecoration: 'line-through',
                                                color: '#999'
                                            }}>
                                                {parseFloat(produit.old_price).toFixed(2)}€
                                            </span>
                                        )}
                                    </div>
                                    <div style={{
                                        fontSize: '13px',
                                        color: produit.stock > 0 ? '#28a745' : '#dc3545',
                                        fontWeight: '600'
                                    }}>
                                        {produit.stock > 0 ? `Stock: ${produit.stock}` : 'Rupture de stock'}
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </>
            )}

            {!loading && produits.length === 0 && !error && (
                <div style={{
                    textAlign: 'center',
                    padding: '60px 20px',
                    color: '#999',
                    fontSize: '16px'
                }}>
                    Aucun produit trouvé dans cette catégorie
                </div>
            )}
        </div>
    );
};

export default FilComp;
