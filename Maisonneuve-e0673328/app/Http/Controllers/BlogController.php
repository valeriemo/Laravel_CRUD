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
    public function edit(Blog $etudiant)
    {
        $blog = Blog::find($etudiant->id);
        return view('blog.blog-edit', compact('blog'));
    }
}
