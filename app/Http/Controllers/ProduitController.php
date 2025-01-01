<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = DB::table('produits')
            ->join('categories', 'produits.type', '=', 'categories.id')
            ->select('produits.*', 'categories.nom as categorie_nom')
            ->get();
    
        return view('StockComponents.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('StockComponents.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => 'required|max:255',
            'type' => 'required|max:255',
            'quantite_stock' => 'required|max:255',
            'prix' => 'required|max:255',
        ]);
        Produit::create($validate);
        return redirect()->route('produit.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = Produit::find($id);
        $categories = Categorie::find($id);

        return view('StockComponents.edit',compact('produit','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nom' => 'string | max:255',
            'type' => 'string | max:255',
            'quantite_stock' => 'integer',
            'prix' => 'integer | max:255',
        ]);

        $produitToUpdated = Produit::find($id);

        $produitToUpdated->update($validate);
        return redirect()->route('produit.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produit::find($id)->delete();
        return redirect()->route('produit.index');

    }
}
