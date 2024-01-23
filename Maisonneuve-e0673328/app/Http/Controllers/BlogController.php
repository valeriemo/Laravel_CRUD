<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{


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


    public function create()
    {
        return view('blog.create');
    }


    public function show(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        $titre = Blog::titreSelect();
        $contenu = Blog::contenuSelect();
        $blog->titre = $titre->find($blog->id)->titre;
        $blog->contenu = $contenu->find($blog->id)->contenu;
        return view('blog.blog-show', compact('blog'));
    }

    public function store(Request $request)
    {
        $request->validate([ //validation des champs
            'titre' => 'required|min:2|max:60',
            'contenu' => 'required|min:3|max:400',
            'titre_en' => 'required|min:2|max:60',
            'contenu_en' => 'nullable|min:3|max:400',
            'date' => 'required|date|max:20|date_format:Y-m-d',
            'user_id' => 'required|integer|exists:users,id',
        ]);
        $blog = new Blog();
        $blog->fill($request->all());
        $blog->save();
        return redirect(route('blog.index'))->withSuccess('Nouveau blog créer !');
    }


    public function edit(Blog $blog)
    {
        // on garde les donnees anglaises et francaises
        return view('blog.blog-edit', compact('blog'));
    }

    public function update(Request $request, Blog $etudiant)
    {
        $request->validate([ //validation des champs
            'titre' => 'required|min:2|max:60',
            'contenu' => 'required|min:3|max:400',
            'titre_en' => 'required|min:2|max:60',
            'contenu_en' => 'min:3|max:400',
            'date' => 'required|date|max:20|date_format:Y-m-d|before_or_equal:today',
            'user_id' => 'required|integer|exists:users,id',
        ]);
        $etudiant->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'titre_en' => $request->titre_en,
            'contenu_en' => $request->contenu_en,
            'date' => $request->date,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('blog.index')->withSuccess('Blog modifié !');
    }

}
