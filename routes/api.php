<?php

use App\Http\Controllers\Api\ProduitApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Route pour filtrer les produits par catégorie
Route::get('/produits/filter/{categorie}', [ProduitApiController::class, 'filter']);

// Route pour ajouter un produit
Route::post('/produits', [ProduitApiController::class, 'store']);

// Route pour récupérer tous les produits
Route::get('/produits', [ProduitApiController::class, 'index']);
