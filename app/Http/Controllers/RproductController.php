<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\Produit;
use Illuminate\Support\Facades\Storage;

class RproductController extends Controller
{
    public function create()
    {
        $categories = Produit::getCategories();
        return view('pages.addproduit', compact('categories'));
    }

    public function store(AddProductRequest $request)
    {
        $request->validated();

        // Upload image LOCAL
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produits', 'public');
        }

        // Features
        $features = null;
        if ($request->filled('features')) {
            $features = array_map('trim', preg_split('/[,\n]+/', $request->features));
        }

        $produit = new Produit();
        $produit->name = $request->name;
        $produit->categorie = $request->categorie;
        $produit->price = $request->price;
        $produit->old_price = $request->old_price;
        $produit->image = $imagePath; // chemin local
        $produit->rating = $request->rating ?? 0;
        $produit->reviews = $request->reviews ?? 0;
        $produit->description = $request->description;
        $produit->features = $features;
        $produit->stock = $request->stock ?? 0;
        $produit->new = $request->has('new');
        $produit->sale = $request->has('sale');
        $produit->save();

        return redirect()->route('produits.index')
            ->with('success', 'Le produit a été ajouté avec succès !');
    }

    public function manage()
    {
        $products = Produit::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.manage-products', compact('products'));
    }

    public function show($id)
    {
        $product = Produit::findOrFail($id);
        return view('pages.showproduct', compact('product'));
    }

    public function edit($id)
    {
        $product = Produit::findOrFail($id);
        $categories = Produit::getCategories();
        return view('pages.edit', compact('product', 'categories'));
    }

    public function update(AddProductRequest $request, $id)
    {
        $request->validated();
        $product = Produit::findOrFail($id);

        // Nouvelle image
        if ($request->hasFile('image')) {
            // supprimer ancienne image
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $product->image = $request->file('image')->store('produits', 'public');
        }

        $features = null;
        if ($request->filled('features')) {
            $features = array_map('trim', preg_split('/[,\n]+/', $request->features));
        }

        $product->name = $request->name;
        $product->categorie = $request->categorie;
        $product->price = $request->price;
        $product->old_price = $request->old_price;
        $product->rating = $request->rating ?? 0;
        $product->reviews = $request->reviews ?? 0;
        $product->description = $request->description;
        $product->features = $features;
        $product->stock = $request->stock ?? 0;
        $product->new = $request->has('new');
        $product->sale = $request->has('sale');
        $product->save();

        return back()->with('successupdate', 'Article mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $product = Produit::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('produits.manage')
            ->with('successdelete', 'Article supprimé avec succès.');
    }

    public function showCleanup()
    {
        $count = Produit::count();
        return view('pages.cleanup', compact('count'));
    }

    public function cleanup()
    {
        $products = Produit::all();

        foreach ($products as $product) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        }

        Produit::truncate();

        return redirect()->route('produits.cleanup.show')
            ->with('success', 'Tous les produits ont été supprimés avec succès !');
    }
}
