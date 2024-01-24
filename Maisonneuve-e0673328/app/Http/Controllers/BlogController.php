<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Affiche tous les articles
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->select()->paginate(10);
        $titres = Blog::titreSelect();
        $contenus = Blog::contenuSelect();
        foreach ($blogs as $blog) {
            $blog->titre = $titres->find($blog->id)->titre;
            $blog->contenu = $contenus->find($blog->id)->contenu;
        }
        return view('blog.index',  compact('blogs'));
    }

    /**
     * Affiche le formulaire de creation d'un article
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Affiche un article
     */
    public function show(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        $titre = Blog::titreSelect();
        $contenu = Blog::contenuSelect();
        $blog->titre = $titre->find($blog->id)->titre;
        $blog->contenu = $contenu->find($blog->id)->contenu;
        return view('blog.blog-show', compact('blog'));
    }

    /**
     * Store un article
     */
    public function store(Request $request)
    {
        $request->validate([ //validation des champs
            'titre' => 'required|min:2|max:60',
            'contenu' => 'required|min:3|max:4000',
            'titre_en' => 'required|min:2|max:60',
            'contenu_en' => 'nullable|min:3|max:4000',
            'date' => 'required|date|max:20|date_format:Y-m-d',
            'user_id' => 'required|integer|exists:users,id',
        ]);
        $blog = new Blog();
        $blog->fill($request->all());
        $blog->save();
        return redirect(route('blog.index'))->withSuccess(trans('lang.blog_created'));
    }

    /**
     * Affiche le formulaire d'edition d'un article
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        return view('blog.blog-edit', compact('blog'));
    }

    /**
     * Update un article
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([ //validation des champs
            'titre' => 'required|min:2|max:60',
            'contenu' => 'required|min:3|max:4000',
            'titre_en' => 'required|min:2|max:60',
            'contenu_en' => 'nullable|min:3|max:4000',
            'date' => 'required|date|max:20|date_format:Y-m-d|before_or_equal:today',
            'user_id' => 'required|integer|exists:users,id',
        ]);
        $blog->fill([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'titre_en' => $request->titre_en,
            'contenu_en' => $request->contenu_en,
            'date' => $request->date,
            'user_id' => $request->user_id,
        ])->save();
        return redirect()->route('blog.index')->withSuccess(trans('lang.blog_modified'));
    }

    /**
     * Supprime un article
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->withSuccess(trans('lang.blog_deleted'));
    }
}
