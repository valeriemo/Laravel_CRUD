<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\  $etudiant
     * @return \Illuminate\Http\Response
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        // on garde les donnees anglaises et francaises
        $blog = Blog::find($blog->id);
        return view('blog.blog-edit', compact('blog'));
    }

    public function update(Request $request, Blog $etudiant)
    {
        $request->validate([ //validation des champs
            'titre' => 'required|min:2|max:45',
            'contenu' => 'required|min:3|max:150',
            'titre_en' => 'required|min:2|max:45',
            'contenu_en' => 'required|min:3|max:150',
            'date' => 'required|date|before:today|max:20|date_format:Y-m-d',
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
