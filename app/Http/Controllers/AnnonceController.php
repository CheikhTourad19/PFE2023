<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $annonce = Annonce::findOrFail($id);


        $annonce->delete();


        return redirect()->route('userannonce');
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'categorie' => 'required|string',
        ]);


        // Récupérer l'annonce à mettre à jour
        $annonce = Annonce::findOrFail($id);

        // Mettre à jour les champs de l'annonce
        $annonce->titre = $request->input('titre');
        $annonce->description = $request->input('description');
        $annonce->prix= $request->input('prix');
        $annonce->categorie=$request->input('categorie');

        // Enregistrer les modifications
        $annonce->save();

        return redirect()->route('userannonce')->with('id','');
    }
}

