<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Affiche la liste paginée des articles.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(6);
        return view('blog.index', compact('articles'));
    }

    /**
     * Montre le formulaire de création d'un nouvel article.
     * Accessible uniquement aux utilisateurs authentifiés.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Stocke un nouvel article en base.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre'   => 'required|string|max:255',
            'contenu' => 'required|string',
            'image'   => 'nullable|image|max:2048',
        ]);

        // Upload de l'image si présente
        if ($request->hasFile('image')) {
            $data['image'] = $request
                ->file('image')
                ->store('articles', 'public');
        }

        // Génération du slug
        $data['slug'] = Str::slug($data['titre']);

        Article::create($data);

        return redirect()
            ->route('blog.index')
            ->with('success', 'Article publié avec succès.');
    }

    /**
     * Affiche un article unique.
     */
    public function show(Article $article)
    {
        return view('blog.show', compact('article'));
    }

    /**
     * Montre le formulaire d'édition d'un article existant.
     */
    public function edit(Article $article)
    {
        return view('blog.edit', compact('article'));
    }

    /**
     * Met à jour un article existant.
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'titre'   => 'required|string|max:255',
            'contenu' => 'required|string',
            'image'   => 'nullable|image|max:2048',
        ]);

        // Remplacement de l'image si uploadée
        if ($request->hasFile('image')) {
            // Supprime l'ancienne image
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request
                ->file('image')
                ->store('articles', 'public');
        }

        // Mise à jour du slug
        $data['slug'] = Str::slug($data['titre']);

        $article->update($data);

        return redirect()
            ->route('blog.index')
            ->with('success', 'Article mis à jour avec succès.');
    }

    /**
     * Supprime un article.
     */
    public function destroy(Article $article)
    {
        // Supprime l'image associée
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return back()->with('success', 'Article supprimé.');
    }
}
