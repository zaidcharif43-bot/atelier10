import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';
import AddComp from './components/AddComp';
import FilComp from './components/FilComp';

const App = () => {
    const [refreshKey, setRefreshKey] = useState(0);

    const handleProductAdded = () => {
        // Rafraîchir la liste des produits après ajout
        setRefreshKey(prevKey => prevKey + 1);
    };

    return (
        <div style={{
            minHeight: '100vh',
            background: 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
            padding: '40px 20px'
        }}>
            <div style={{
                maxWidth: '1200px',
                margin: '0 auto'
            }}>
                {/* Header */}
                <div style={{
                    textAlign: 'center',
                    marginBottom: '40px',
                    color: 'white'
                }}>
                    <h1 style={{
                        fontSize: '48px',
                        fontFamily: 'Playfair Display, serif',
                        marginBottom: '10px',
                        textShadow: '2px 2px 4px rgba(0,0,0,0.2)'
                    }}>
                        🛍️ Gestion des Produits
                    </h1>
                    <p style={{
                        fontSize: '18px',
                        opacity: '0.95'
                    }}>
                        Application React + Laravel API
                    </p>
                </div>

                {/* Composant d'ajout */}
                <AddComp onProductAdded={handleProductAdded} />

                {/* Composant de filtrage */}
                <div key={refreshKey}>
                    <FilComp />
                </div>
            </div>
        </div>
    );
};

// Point d'entrée de l'application React
if (document.getElementById('react-app')) {
    const root = ReactDOM.createRoot(document.getElementById('react-app'));
    root.render(<App />);
}

export default App;
