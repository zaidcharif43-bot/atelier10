<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

// Page d'accueil
Route::get('/', [PageController::class, 'home'])->name('home');

// Pages statiques
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Route pour traiter le formulaire de contact
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');

// Routes produits
Route::get('/produits', [ProductController::class, 'index'])->name('produits.index');
Route::get('/produits/{category}', [ProductController::class, 'category'])->name('produits.category');
Route::get('/produit/{id}', [ProductController::class, 'show'])->name('produits.show');
