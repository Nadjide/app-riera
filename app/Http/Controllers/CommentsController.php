<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'body' => 'required',
            'post_id' => 'required',// Assurez-vous que le champ post_id existe et correspond à un post existant
        ]);

        // Créer une nouvelle instance de commentaire
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->post_id = $request->input('post_id');
        $comment->user_id = auth()->user()->id; // Ajouter cette ligne pour définir user_id
        $comment->created_at = now();

        // Autres attributs du commentaire (par exemple, user_id)

        // Sauvegarder le commentaire
        $comment->save();

        return redirect('/posts')->with('success', 'Comment added successfully');

        // Rediriger ou retourner une réponse appropriée
        // selon votre logique d'application
    }
}

