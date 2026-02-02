import React, { useState } from 'react';

const AddComp = ({ onProductAdded }) => {
    const [formData, setFormData] = useState({
        name: '',
        categorie: 'homme',
        price: '',
        old_price: '',
        description: '',
        stock: '',
        rating: '5',
        new: false,
        sale: false
    });
    const [image, setImage] = useState(null);
    const [loading, setLoading] = useState(false);
    const [message, setMessage] = useState({ type: '', text: '' });

    const handleChange = (e) => {
        const { name, value, type, checked } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: type === 'checkbox' ? checked : value
        }));
    };

    const handleImageChange = (e) => {
        setImage(e.target.files[0]);
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        setMessage({ type: '', text: '' });

        const formDataToSend = new FormData();
        
        // Ajouter les champs en s'assurant du bon format
        formDataToSend.append('name', formData.name);
        formDataToSend.append('categorie', formData.categorie.toLowerCase()); // Forcer minuscules
        formDataToSend.append('price', formData.price);
        
        if (formData.old_price) {
            formDataToSend.append('old_price', formData.old_price);
        }
        if (formData.description) {
            formDataToSend.append('description', formData.description);
        }
        if (formData.stock) {
            formDataToSend.append('stock', formData.stock);
        }
        if (formData.rating) {
            formDataToSend.append('rating', formData.rating);
        }
        
        // Booléens convertis en 1/0
        formDataToSend.append('new', formData.new ? '1' : '0');
        formDataToSend.append('sale', formData.sale ? '1' : '0');
        
        if (image) {
            formDataToSend.append('image', image);
        }
        
        // Debug: voir ce qui est envoyé
        console.log('Données envoyées:');
        for (let [key, value] of formDataToSend.entries()) {
            console.log(`${key}:`, value);
        }

        try {
            const response = await fetch('http://localhost:8000/api/produits', {
                method: 'POST',
                body: formDataToSend
            });

            const data = await response.json();

            if (data.success) {
                setMessage({ type: 'success', text: 'Produit ajouté avec succès!' });
                // Réinitialiser le formulaire
                setFormData({
                    name: '',
                    categorie: 'homme',
                    price: '',
                    old_price: '',
                    description: '',
                    stock: '',
                    rating: '5',
                    new: false,
                    sale: false
                });
                setImage(null);
                if (onProductAdded) onProductAdded();
            } else {
                setMessage({ type: 'error', text: data.message || 'Erreur lors de l\'ajout' });
            }
        } catch (error) {
            setMessage({ type: 'error', text: 'Erreur de connexion au serveur' });
        } finally {
            setLoading(false);
        }
    };

    return (
        <div style={{
            background: 'white',
            borderRadius: '15px',
            padding: '30px',
            boxShadow: '0 10px 40px rgba(0,0,0,0.1)',
            marginBottom: '30px'
        }}>
            <h2 style={{
                marginBottom: '20px',
                fontFamily: 'Playfair Display, serif',
                color: '#1a1a2e'
            }}>
                ➕ Ajouter un nouveau produit
            </h2>

            {message.text && (
                <div style={{
                    padding: '15px',
                    borderRadius: '8px',
                    marginBottom: '20px',
                    background: message.type === 'success' ? '#d4edda' : '#f8d7da',
                    color: message.type === 'success' ? '#155724' : '#721c24',
                    border: `1px solid ${message.type === 'success' ? '#c3e6cb' : '#f5c6cb'}`
                }}>
                    {message.text}
                </div>
            )}

            <form onSubmit={handleSubmit}>
                <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '20px' }}>
                    <div>
                        <label style={{ display: 'block', marginBottom: '8px', fontWeight: '600' }}>
                            Nom du produit *
                        </label>
                        <input
                            type="text"
                            name="name"
                            value={formData.name}
                            onChange={handleChange}
                            required
                            style={{
                                width: '100%',
                                padding: '12px',
                                borderRadius: '8px',
                                border: '1px solid #ddd',
                                fontSize: '14px'
                            }}
                        />
                    </div>

                    <div>
                        <label style={{ display: 'block', marginBottom: '8px', fontWeight: '600' }}>
                            Catégorie *
                        </label>
                        <select
                            name="categorie"
                            value={formData.categorie}
                            onChange={handleChange}
                            required
                            style={{
                                width: '100%',
                                padding: '12px',
                                borderRadius: '8px',
                                border: '1px solid #ddd',
                                fontSize: '14px'
                            }}
                        >
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                            <option value="accessoires">Accessoires</option>
                        </select>
                    </div>

                    <div>
                        <label style={{ display: 'block', marginBottom: '8px', fontWeight: '600' }}>
                            Prix *
                        </label>
                        <input
                            type="number"
                            name="price"
                            value={formData.price}
                            onChange={handleChange}
                            step="0.01"
                            required
                            style={{
                                width: '100%',
                                padding: '12px',
                                borderRadius: '8px',
                                border: '1px solid #ddd',
                                fontSize: '14px'
                            }}
                        />
                    </div>

                    <div>
                        <label style={{ display: 'block', marginBottom: '8px', fontWeight: '600' }}>
                            Ancien prix
                        </label>
                        <input
                            type="number"
                            name="old_price"
                            value={formData.old_price}
                            onChange={handleChange}
                            step="0.01"
                            style={{
                                width: '100%',
                                padding: '12px',
                                borderRadius: '8px',
                                border: '1px solid #ddd',
                                fontSize: '14px'
                            }}
                        />
                    </div>

                    <div>
                        <label style={{ display: 'block', marginBottom: '8px', fontWeight: '600' }}>
                            Stock
                        </label>
                        <input
                            type="number"
                            name="stock"
                            value={formData.stock}
                            onChange={handleChange}
                            style={{
                                width: '100%',
                                padding: '12px',
                                borderRadius: '8px',
                                border: '1px solid #ddd',
                                fontSize: '14px'
                            }}
                        />
                    </div>

                    <div>
                        <label style={{ display: 'block', marginBottom: '8px', fontWeight: '600' }}>
                            Image
                        </label>
                        <input
                            type="file"
                            accept="image/*"
                            onChange={handleImageChange}
                            style={{
                                width: '100%',
                                padding: '12px',
                                borderRadius: '8px',
                                border: '1px solid #ddd',
                                fontSize: '14px'
                            }}
                        />
                    </div>
                </div>

                <div style={{ marginTop: '20px' }}>
                    <label style={{ display: 'block', marginBottom: '8px', fontWeight: '600' }}>
                        Description
                    </label>
                    <textarea
                        name="description"
                        value={formData.description}
                        onChange={handleChange}
                        rows="4"
                        style={{
                            width: '100%',
                            padding: '12px',
                            borderRadius: '8px',
                            border: '1px solid #ddd',
                            fontSize: '14px',
                            fontFamily: 'inherit'
                        }}
                    />
                </div>

                <div style={{ marginTop: '20px', display: 'flex', gap: '20px' }}>
                    <label style={{ display: 'flex', alignItems: 'center', gap: '8px' }}>
                        <input
                            type="checkbox"
                            name="new"
                            checked={formData.new}
                            onChange={handleChange}
                        />
                        <span>Nouveau produit</span>
                    </label>

                    <label style={{ display: 'flex', alignItems: 'center', gap: '8px' }}>
                        <input
                            type="checkbox"
                            name="sale"
                            checked={formData.sale}
                            onChange={handleChange}
                        />
                        <span>En promotion</span>
                    </label>
                </div>

                <button
                    type="submit"
                    disabled={loading}
                    style={{
                        marginTop: '30px',
                        padding: '15px 40px',
                        background: loading ? '#ccc' : 'linear-gradient(135deg, #28a745 0%, #20c997 100%)',
                        color: 'white',
                        border: 'none',
                        borderRadius: '25px',
                        fontSize: '16px',
                        fontWeight: '600',
                        cursor: loading ? 'not-allowed' : 'pointer',
                        transition: 'transform 0.3s'
                    }}
                    onMouseOver={(e) => !loading && (e.target.style.transform = 'scale(1.05)')}
                    onMouseOut={(e) => e.target.style.transform = 'scale(1)'}
                >
                    {loading ? 'Ajout en cours...' : 'Ajouter le produit'}
                </button>
            </form>
        </div>
    );
};

export default AddComp;
