<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenement;

class EvenementController extends Controller
{
    public function index()
    {
        // Vérifier l'autorisation de l'utilisateur
        if (!$this->isAdmin()) {

            return response('Accès non autorisé', 403);
        }

        $evenements = Evenement::all();

        return view('evenements.index', compact('evenements'));
    }

    private function isAdmin()
    {

        return auth()->check() && auth()->user()->hasRole('admin');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'titre' => 'required',
        'date' => 'required',
        'description' => 'required',
    ]);


    $evenement = new Evenement;
    $evenement->titre = $validatedData['titre'];
    $evenement->date = $validatedData['date'];
    $evenement->description = $validatedData['description'];


    $evenement->save();

    return redirect()->route('evenements.index')->with('success', 'Événement créé avec succès');
}

}
